<?php namespace App\Http\Livewire\Admin;

use Livewire\Component;

class BaseComponent extends Component
{
    protected $listeners = ['activeConfirm' => 'deleteRegister'];

    public $limit = 5;
    public $keyWord = '';
    public $iconSort = 'la la-arrow-down';
    public $fieldSort;
    public $sort = 'asc';

    public $frame = 'index';
    public $deleteId;
    public $image_path;

    public $itemId;

    public function changeSort($field)
    {
        if ($this->fieldSort == $field) {
            if ($this->sort == 'desc') {
                $this->iconSort = 'la la-arrow-down';
                $this->sort = 'asc';
            } else {
                $this->iconSort = 'la la-arrow-up';
                $this->sort = 'desc';
            }
        } else {
            $this->iconSort = 'la la-arrow-down';
            $this->sort = 'asc';
        }
        $this->fieldSort = $field;
    }

    public function updatePagination($size = 0)
    {
        $this->limit = $size;
    }

    public function deleteConfirm($id)
    {
        $this->deleteId = $id;
        $this->emit('deleteAlert');
    }

    public function dateSpanish($date, $part = 'full')
    {
        $time = date('H:i', strtotime($date));

        $year = date('Y', strtotime($date));
        $month = date('n', strtotime($date));
        $day = date('d', strtotime($date));
        $week = date('w', strtotime($date));
        $daysWeek = [
            "Domingo",
            "Lunes",
            "Martes",
            "Miércoles",
            "Jueves",
            "Viernes",
            "Sábado"
        ];
        $months = [
            1 =>
                "Enero",
            "Febrero",
            "Marzo",
            "Abril",
            "Mayo",
            "Junio",
            "Julio",
            "Agosto",
            "Septiembre",
            "Octubre",
            "Noviembre",
            "Diciembre"

        ];

        switch ($part) {
            case 'full':
                return $daysWeek[$week] . ", $day de " . $months[$month] . " de $year";
            case 'year':
                return $year;
            case 'month':
                return $months[$month];
            case 'day':
                return $day;
            case 'without':
                return "$day de " . $months[$month] . " de $year";
            case 'withtime':
                return $daysWeek[$week] . ", $day de " . $months[$month] . " de $year - $time";
            default:
                return $daysWeek[$week];
        }
    }
}
