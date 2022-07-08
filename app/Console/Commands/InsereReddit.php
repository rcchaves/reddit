<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use DB;


class InsereReddit extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'insere:reddit';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Inserir post da api Reddit';

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

        $response =  Http::get('https://api.reddit.com/r/artificial/hot');
        foreach ($response['data']['children'] as $child) {

            $autor   =  $child['data']['author_fullname'];
            $titulo  =  $child['data']['title'];
            $ups     =  $child['data']['ups'];
            $coments =  $child['data']['num_comments'];

            DB::table('reddit')->insert(
                array(
                    'autor' => $autor,
                    'titulo' => $titulo,
                    'ups' => $ups,
                    'coments' => $coments
                )
            );
        }
    }
}
