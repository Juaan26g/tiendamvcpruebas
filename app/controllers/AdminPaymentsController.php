<?php

class AdminPaymentsController extends Controller
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
    public function add()
    {
        $errors = [];
        $dataForm = [];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $name = Validate::text($_POST['name'] ?? '' );
        $description = Validate::text($_POST['description'] ?? '' );
            
        
            if (empty($name)) {
                array_push($errors, 'El tipo de metodo de pago requerido');
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



$data = [
'titulo' => 'Administración de Metodos de pago',
'menu' => false,
'admin' => true,
'errors' => $errors,
'data' => $dataForm,
];

$this->view('admin/payments/add', $data);

}
}