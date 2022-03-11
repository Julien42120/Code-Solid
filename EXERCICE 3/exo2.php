<?php

class Report
{
    public function getTitle()
    {
        return 'Report Title';
    }

    public function getDate()
    {
        return '2016-04-21';
    }

    public function getContents()
    {
        return [
            'title' => $this->getTitle(),
            'date' => $this->getDate(),
        ];
    }

    public function formatJson()
    {
        return json_encode($this->getContents());
    }
}


//////////////////////////////////////////////////
//////////////////// Report //////////////////////
//////////////////////////////////////////////////

interface IReport
{
    public function getTitle();
    public function getDate();
    public function getContents();
}

interface IFormat
{
    public function format(IReport $report);
}

class Report implements IReport
{
    public function getTitle()
    {
        return 'Report Title';
    }

    public function getDate()
    {
        return '2016-04-21';
    }

    public function getContents()
    {
        return [
            'title' => $this->getTitle(),
            'date' => $this->getDate(),
        ];
    }
}

class FormatJson implements IFormat
{
    public function format(IReport $report)
    {
        return json_encode($report->getContents());
    }
}

$rep = new Report;
$form = new FormatJson;
echo $form->format($rep);
