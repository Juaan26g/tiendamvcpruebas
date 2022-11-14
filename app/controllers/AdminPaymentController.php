<?php

class AdminPaymentController extends Controller
{
    private $model;

    public function __construct()
    {
        $this->model = $this->model('AdminPayment');
    }

    public function index()
    {
        $session = new AdminSession();

        if ($session->getLogin()) {

            $payments = $this->model->getPayments();

            $data = [
                'titulo' => 'Administración de Metodos de pago',
                'menu' => false,
                'admin' => true,
                'payments' => $payments,
            ];

            $this->view('admin/payments/index', $data);
        } else {
            header('LOCATION:' . ROOT . 'admin');
        }

    }

    public function edit($id)
    {
        $errors = [];
        $dataForm = [];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  
            $name = Validate::text($_POST['name'] ?? '');
            $description = Validate::text($_POST['description'] ?? '');
    
            // Validamos la información
            if (empty($name)) {
                array_push($errors, 'El nombre del producto es requerido');
            }
            if (empty($description)) {
                array_push($errors, 'La descripción del producto es requerida');
            }
            
            // Creamos el array de datos
            $dataForm = [
                'name'  => $name,
                'description' => $description,
                
            ];

            if ( ! $errors ) {

                if (  count($this->model->edit($dataForm)) == 0 ) {

                    header('location:' . ROOT . 'AdminPayment');

                }
                array_push($errors, 'Se ha producido un error en la inserción en la BD');
            }

        }

        $payment = $this->model->getPaymentsById($id);

        $data = [
            'titulo' => 'Administración de Productos - Edición',
            'menu' => false,
            'admin' => true,
            'errors' => $errors,
            'data' => $payment,
        ];

        $this->view('admin/payments/edit', $data);
    }
    public function add()
    {
        $errors = [];
        $dataForm = [];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $name = Validate::text($_POST['name'] ?? '' );
        $description = Validate::text($_POST['description'] ?? '' );
            
        
            if (empty($name)) {
                array_push($errors, 'El nombre es requerido');
            }
            if (empty($description)) {
                array_push($errors, 'La descripción es requerida');
            }
}
    $dataForm = [       
        'name'  => $name,
        'description' => $description,
];
    
if ( ! $errors ) {

    if ( $this->model->add($dataForm) ) {

        header('location:' . ROOT . 'AdminPayment');

    }
    array_push($errors, 'Se ha producido un error en la inserción en la BD');
}



$data = ['errors' => $errors,
'titulo' => 'Administración de Metodos de pago',
'menu' => false,
'admin' => true,
'errors' => $errors,
'data' => $dataForm,
];

$this->view('admin/payments/add', $data);

}


public function delete ($id)
    {
        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $errors = $this->model->delete($id);

            if (empty($errors)) {
                header('location:' . ROOT . 'AdminPayment');
            }

        }

        $payment = $this->model->getPaymentsById($id);
        
        $data = [
            'titulo' => 'Administración de Metodos de Pagos - Eliminación',
            'menu' => false,
            'admin' => true,
            'errors' => $errors,
            'data' => $payment,
        ];
        $this->view('admin/payments/delete', $data);
    }
}