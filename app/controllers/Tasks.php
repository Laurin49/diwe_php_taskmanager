<?php
class Tasks extends Controller {
    public function __construct()
    {
        $this->taskModel = $this->model('Task');
    }

    public function index() {
        $tasks = $this->taskModel->getTasks();
        $data = [
            'tasks' => $tasks
        ];
        $this->view('tasks/index', $data);
    }

    public function add() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'name' => trim($_POST['name']),
                'beschreibung' => trim($_POST['beschreibung']),
                'name_err' => '',
                'beschreibung_err' => ''
            ];

            // Validate data
            if(empty($data['name'])){
                $data['name_err'] = 'Please enter name';
            }
            if(empty($data['beschreibung'])){
                $data['beschreibung_err'] = 'Please enter beschreibung';
            }

            // Make sure no errors
            if(empty($data['name_err']) && empty($data['beschreibung_err'])) {
                // Validated
                if ($this->taskModel->addTask($data)) {
                    flash('task_message', 'Task Added');
                    redirect('tasks');
                } else {
                    die('Something went wrong');
                }
            } else {
                    // Load view with errors
                    $this->view('tasks/add', $data);
            }
        } else {
            $data = [
                'name' => '',
                'beschreibung' => ''
            ];

            $this->view('tasks/add', $data);
        }
    }

    public function edit($id) {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'id' => $id,
                'name' => trim($_POST['name']),
                'beschreibung' => trim($_POST['beschreibung']),
                'name_err' => '',
                'beschreibung_err' => ''
            ];

            // Validate data
            if(empty($data['name'])){
                $data['name_err'] = 'Please enter name';
            }
            if(empty($data['beschreibung'])){
                $data['beschreibung_err'] = 'Please enter beschreibung';
            }

            // Make sure no errors
            if(empty($data['name_err']) && empty($data['beschreibung_err'])){
                // Validated
                if($this->taskModel->updateTask($data)){
                    flash('task_message', 'Task Updated');
                    redirect('tasks');
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load view with errors
                $this->view('tasks/edit', $data);
            }

        } else {

            $task = $this->taskModel->getTaskById($id);

            $data = [
                'id' => $id,
                'name' => $task->name,
                'beschreibung' => $task->beschreibung
            ];

            $this->view('tasks/edit', $data);
        }
    }

    public function delete($id) {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if ($task = $this->taskModel->deleteTask($id)) {
                flash('task_message', 'Task deleted ...');
                redirect('tasks');
            } else {
                die('Deleting Task - Something went wrong ...');
            }
        } else {
            redirect('tasks');
        }
    }


}
