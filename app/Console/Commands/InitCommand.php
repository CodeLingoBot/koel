<?php

namespace App\Console\Commands;

use App\Models\Setting;
use App\Models\User;
use App\Repositories\SettingRepository;
use App\Services\MediaCacheService;
use Exception;
use Illuminate\Console\Command;
use Illuminate\Contracts\Console\Kernel as Artisan;
use Illuminate\Contracts\Hashing\Hasher	as Hash;
use Illuminate\Database\DatabaseManager as DB;
use Jackiedo\DotenvEditor\DotenvEditor;

class InitCommand extends Command
{
    protected $signature = 'koel:init';
    protected $description = 'Install or upgrade Koel';

    private $mediaCacheService;
    private $artisan;
    private $dotenvEditor;
    private $hash;
    private $db;
    private $settingRepository;

    public function __construct(
        MediaCacheService $mediaCacheService,
        SettingRepository $settingRepository,
        Artisan $artisan,
        Hash $hash,
        DotenvEditor $dotenvEditor,
        DB $db
    ) {
        parent::__construct();

        $this->mediaCacheService = $mediaCacheService;
        $this->artisan = $artisan;
        $this->dotenvEditor = $dotenvEditor;
        $this->hash = $hash;
        $this->db = $db;
        $this->settingRepository = $settingRepository;
    }

    public function handle(): void
    {
        $this->comment('Attempting to install or upgrade Koel.');
        $this->comment('Remember, you can always install/upgrade manually following the guide here:');
        $this->info('📙  '.config('koel.misc.docs_url').PHP_EOL);

        if ($this->inNoInteractionMode()) {
            $this->info('Running in no-interaction mode');
        }

        $this->maybeGenerateAppKey();
        $this->maybeGenerateJwtSecret();
        $this->maybeSetUpDatabase();
        $this->migrateDatabase();
        $this->maybeSeedDatabase();
        $this->maybeSetMediaPath();
        $this->compileFrontEndAssets();

        $this->comment(PHP_EOL.'🎆  Success! Koel can now be run from localhost with `php artisan serve`.');

        if (Setting::get('media_path')) {
            $this->comment('You can also scan for media with `php artisan koel:sync`.');
        }

        $this->comment('Again, for more configuration guidance, refer to');
        $this->info('📙  '.config('koel.misc.docs_url'));
        $this->comment('or open the .env file in the root installation folder.');
        $this->comment('Thanks for using Koel. You rock!');
    }

    /**
     * Prompt user for valid database credentials and set up the database.
     */
    

    

    

    

    

    

    

    

    

    

    /** @return array<string> */
    

    

    
}
