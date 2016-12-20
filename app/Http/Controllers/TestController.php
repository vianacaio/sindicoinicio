<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class TestController extends Controller {

    public function index() {
        $data['tasks'] = [
                [
                        'name' => 'Reserva com duplicidade',
                        'progress' => '87',
                        'color' => 'danger'
                ],
                [
                        'name' => 'Valor incorreto do aluguel de mesas',
                        'progress' => '76',
                        'color' => 'warning'
                ],
                [
                        'name' => 'Atraso no atendimento das solicitações',
                        'progress' => '32',
                        'color' => 'success'
                ],
                [
                        'name' => 'Uso indevido de vaga de garagem',
                        'progress' => '56',
                        'color' => 'info'
                ],
                [
                        'name' => 'Atraso de pagamento',
                        'progress' => '10',
                        'color' => 'success'
                ]
        ];
        return view('test')->with($data);
    }

}