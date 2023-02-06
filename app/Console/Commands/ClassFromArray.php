<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;
use Nette\PhpGenerator\ClassType;
use Nette\PhpGenerator\Printer;
use Spatie\LaravelData\Data;
use Nette;

class ClassFromArray extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'class:from-array';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate a class from array ';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $items = [
            'name' => ['required', 'max:100'],
            'email' => ['nullable', 'max:50', 'email'],
            'phone' => ['nullable', 'max:50'],
            'address' => ['nullable', 'max:150'],
            'city' => ['nullable', 'max:50'],
            'region' => ['nullable', 'max:50'],
            'country' => ['nullable', 'max:2'],
            'postal_code' => ['nullable', 'max:25'],
        ];

        $method = new Nette\PhpGenerator\Method("__construct");
        foreach (array_keys($items) as $item) {
            $method->addPromotedParameter(Str::camel($item))
                ->setPublic();
        }
        echo (new Printer)->printMethod($method);
        return Command::SUCCESS;
    }
}
