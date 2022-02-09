<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\News;
use GuzzleHttp\Client;

class NewsMinute extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'minute:news';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'It is schedule to fetch api and save in database';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $data = Http::get("https://newsapi.org/v2/everything?q=Apple&from=2022-02-08&sortBy=popularity&apiKey=3cc4016c818b4e2c99bd04758ffce64f");
        if(isset($data) && count(array($data)) > 0){
            foreach($data['articles'] as $d){
                $news_data = News::where(['title'=>$d['title']])->first();
                if($news_data == ''){
                    News::create([
                        'source'=>$d['source']['name'],
                        'author'=>$d['author'],
                        'title'=>$d['title'],
                        'description'=>$d['description'],
                        'url'=>$d['url'],
                        'urlToImage'=>$d['urlToImage'],
                        'publishedAt'=> date("Y-m-d H:i:s", strtotime($d['publishedAt'])),
                        'content'=>$d['content'],
                    ]);
                }
            }
        }
    }
}
