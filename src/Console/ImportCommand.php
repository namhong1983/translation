<?php

namespace Bamboo\Admin\Translation\Console;

use Bamboo\Admin\Translation\Translation;
use Illuminate\Console\Command;

class ImportCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:translations:import {locale} {--force}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import translations from the PHP sources';

    /**
     * @var Translation
     */
    protected $manager;

    /**
     * ResetCommand constructor.
     *
     * @param Translation $manager
     */
    public function __construct(Translation $manager)
    {
        $this->manager = $manager;

        parent::__construct();
    }

    /**
     * {@inheritdoc}
     */
    public function handle()
    {
        $counter = $this->manager->importTranslations($this->argument('locale'), $this->option('force'));

        $this->info('Done importing, processed '.$counter.' items!');
    }
}
