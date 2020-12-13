Laravel e-commerce application

https://www.larashout.com/laravel-ecommerce-application-development-introduction


Akbank sanal-pos için gerekli paketler:
    composer require spatie/array-to-xml
        (ERROR) PHP Fatal error: Allowed memory size of 1610612736 bytes exhausted (tried to allocate 266240 bytes) in p
        (SOLUTION)
        Goto C:\ProgramData\ComposerSetup\bin
        Edit: composer.bat and add memory_limit=-1 in the last line as shown below.
        @echo OFF
        :: in case DelayedExpansion is on and a path contains ! 
        setlocal DISABLEDELAYEDEXPANSION
        php -d memory_limit=-1 "%~dp0composer.phar" %*
