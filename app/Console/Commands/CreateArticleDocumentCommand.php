<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Illuminate\Filesystem\Filesystem;

class CreateArticleDocumentCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create_article_document';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return mixed
     */
    public function handle()
    {
        $disk = Storage::disk('local');
        $storeDir = '/documents/articles';
        $storeFilename = 'test2.txt';
        $storeFile = sprintf('%s/%s', $storeDir, $storeFilename);

        // ファイルの読み込み
        $fs = new Filesystem();
        $filePath = storage_path('app').$storeFile;
        $contents = $fs->get($filePath);

        $this->info($contents);
    }
}
