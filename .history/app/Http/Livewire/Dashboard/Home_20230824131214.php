<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;

class Home extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $studentsInPage = [], $allStudents = [];

    public $paginate = 10;
    public $sections = [];
    public $search = '';
    public $sortField = 'name', $sortDirection = 'asc';
    public $selectedClass = null, $selectedSection = null;

    public function mount()
    {
        $this->allStudents = $this->studentsQuery->pluck('id')->toArray();
        $this->studentsInPage = $this->students->pluck('id')->toArray();
    }

    public function render()
    {
        return view('livewire.dashboard.name', [
            'students' => $this->students,
            'classes' => \App\Models\Classes::all(),
        ]);
    }

    protected $listeners = [
        'deleteSingleRecord',
        'deleteMultipleRecords',
        'exportStudents'
    ];

    public function updatedSelectedClass($value)
    {
        $this->sections = \App\Models\Section::where('class_id', $value)->get();
        $this->reset('selectedSection');
    }

    public function getStudentsQueryProperty()
    {
        return Student::with(['class', 'section'])
            ->search(trim($this->search))
            ->orderBy($this->sortField, $this->sortDirection)
            ->when($this->selectedClass, function ($query) {
                return $query->where('class_id', $this->selectedClass);
            })
            ->when($this->selectedSection, function ($query) {
                return $query->where('section_id', $this->selectedSection);
            });
    }

    public function changeSort($sortField)
    {
        if ($this->sortField == $sortField) {
            $this->sortDirection = $this->sortDirection == 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $sortField;
        }

        $this->studentsInPage = $this->students->pluck('id')->toArray();
    }

    public function getStudentsProperty()
    {
        return $this->studentsQuery->paginate($this->paginate);
    }

    public function deleteSingleRecord($id)
    {
        Student::find($id)->delete();
        session()->flash('success', 'Student deleted successfully.');
    }

    public function deleteMultipleRecords(array $checked)
    {
        Student::whereIn('id', $checked)->delete();
        session()->flash('success', 'Students deleted successfully.');
    }

    public function updatedPaginate()
    {
        $this->studentsInPage = $this->students->pluck('id')->toArray();
    }

    public function exportStudents(array $checked)
    {
        return (new StudentsExport($checked))->download(now() . ' - students.xlsx');
    }
    // public function render()
    // {
    //     return view('livewire.dashboard.home');
    // }
}
