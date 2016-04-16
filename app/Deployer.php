<?php


namespace App;


class Deployer
{
    public function create()
    {
        $this->createDroplet();
        // TODO: Install game?
    }

    public function destroy()
    {

    }

    public function pause()
    {

    }

    public function resume()
    {

    }

    function createDroplet()
    {

        $createdDroplet = \DigitalOcean::droplet()->create(str_random(), 'ams3', '2gb', 'ubuntu-14-04-x64');
        dd($createdDroplet);
    }
}