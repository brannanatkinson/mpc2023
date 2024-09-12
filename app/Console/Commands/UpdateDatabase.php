<?php

namespace App\Console\Commands;

use Illuminate\Support\Facades\Config;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\Category;
use App\Models\Item;
use App\Models\Sponsor;

class UpdateDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-database';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Copy Statamic records to database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        /*
        |--------------------------------------------------------------------------
        | Update Categories
        |--------------------------------------------------------------------------
        |
        */
        $response = Http::get(Config::get('app.url').'/api/taxonomies/items/terms');
        $result = json_decode($response);
        $terms = '';
        foreach( $result->data as $term){
            $category = Category::updateOrCreate(
                ['slug' => $term->slug],
                [
                    'name' => $term->title,
                    'description' => $term->description
                ]
            );
            $category->save();
        }
        
        /*
        |--------------------------------------------------------------------------
        | Update Items
        |--------------------------------------------------------------------------
        |
        | Gets Items collection from Statamic and pushes updates to DB
        |
        */
        $response = Http::get(Config::get('app.url').'/api/collections/items/entries');
        $result = json_decode($response);
        foreach( $result->data as $item){
            $item = Item::updateOrCreate(
                ['statamic_id' => $item->id],
                [
                    'name' => $item->title,
                    'excerpt' => $item->excerpt,
                    'description' => $item->content,
                    'cost' => $item->price,
                    'category_id' => Category::where('slug', $item->items[0]->slug)->first()->id
                ]
            );
            $item->save();
        }
        
        /*
        |--------------------------------------------------------------------------
        | Update Sponsors
        |--------------------------------------------------------------------------
        |
        | Gets Sponsors Collection and pushes updates to DB
        |
        */    
        $response = Http::get(Config::get('app.url').'/api/collections/sponsors/entries');
        $result = json_decode($response);
        foreach( $result->data as $sponsor){
            $sponsor = Sponsor::updateOrCreate(
                ['statamic_id' => $sponsor->id],
                [
                    'name' => $sponsor->title,
                    'amount' => $sponsor->amount,
                    'category' => $sponsor->sponsor_type->value
                ]
            );
            $sponsor->save();
        }

        /*
        |--------------------------------------------------------------------------
        | Update Matching Sponsors
        |--------------------------------------------------------------------------
        |
        | Gets all Items, checks to see if there is a sponsor. If so, looks up
        | Sponsor id and adds it to the sponsor_id in Items
        |
        */    
        $response = Http::get(Config::get('app.url').'/api/collections/items/entries');
        $result = json_decode($response);
        $items_dd = [];
        foreach( $result->data as $item){
            if ( !empty( $item->item_sponsor[0]->id ) ){
                $sponsor_id = Sponsor::where('statamic_id',  $item->item_sponsor[0]->id)->first()->id;
                $item_update = Item::where('statamic_id', $item->id)
                    ->update([
                        'sponsor_id' => $sponsor_id
                    ]);
                $sponsor = Sponsor::where( 'id', $sponsor_id)
                    ->update([
                        'item_id' => Item::where('statamic_id', $item->id)->first()->id
                    ]);
            } else {
                $item = Item::where('statamic_id', $item->id)
                ->update([
                    'sponsor_id' => null
                ]);
            }
            
        }
        $this->info('Successfully updated database.');
    }
}
