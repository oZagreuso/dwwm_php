<?php 

require_once('Client.php');
require_once('Intrevenant.php');

class Intervention
{
    protected Client $client; 
    protected Intervenant $intervenant;
    protected $dateIntervention;
    protected $heureIntervention;
    protected $description;


    public function __construct(Client $client, Intervenant $intervenant, string $dateIntervention, string $heureIntervention, string $description)
    {
        $this->client = $client;
        $this->intervenant = $intervenant;
        $this->dateIntervention = $dateIntervention;
        $this->heureIntervention = $heureIntervention;
        $this->description = $description;

    }

    public function dateIntervention() 
    {
        return $this->dateIntervention();
    }

    public function getHeureIntervention()
    {
        return $this->heureIntervention;
    }

    public function getDescription()
    {
        return $this->description;
    }
}