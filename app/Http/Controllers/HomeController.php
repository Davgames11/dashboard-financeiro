<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $url = "https://economia.awesomeapi.com.br/json/last/USD-BRL,EUR-BRL,BTC-BRL,ETH-BRL,XRP-BRL";
        $dados = file_get_contents($url);
        $dadosjson = json_decode($dados);

        $chartjs = app()->chartjs
            ->name('CotacaodeMoedas')
            ->type('line')
            ->size(['width' => 400, 'height' => 200])
            ->labels(['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho'])
            ->datasets([
                [
                    "label" => "Dolar",
                    'backgroundColor' => "#124E78",
                    'borderColor' => "#124E78",
                    "pointBorderColor" => "#124E78",
                    "pointBackgroundColor" => "#124E78",
                    "pointHoverBackgroundColor" => "#fff",
                    "pointHoverBorderColor" => "rgba(220,220,220,1)",
                    "data" => $dadosjson->USDBRL->bid,
                    "fill" => false,
                ],
                [
                    "label" => "Euro",
                    'backgroundColor' => "#F2BB05",
                    'borderColor' => "#F2BB05",
                    "pointBorderColor" => "#F2BB05",
                    "pointBackgroundColor" => "#F2BB05",
                    "pointHoverBackgroundColor" => "#fff",
                    "pointHoverBorderColor" => "rgba(220,220,220,1)",
                    "data" => $dadosjson->EURBRL->bid,
                    "fill" => false,
                ],
                [
                    "label" => "Bitcoin",
                    'backgroundColor' => "#D74E09",
                    'borderColor' => "#D74E09",
                    "pointBorderColor" => "#D74E09",
                    "pointBackgroundColor" => "#D74E09",
                    "pointHoverBackgroundColor" => "#fff",
                    "pointHoverBorderColor" => "rgba(220,220,220,1)",
                    "data" => $dadosjson->BTCBRL->bid,
                    "fill" => false,
                ],
            ])
            ->options([]);




        $valorFinalBitcoin = $this->formatarMoeda($dadosjson->BTCBRL->bid);
        $valorFinalEtherium = $this->formatarMoeda($dadosjson->ETHBRL->bid);
        $valorFinalXRP = $this->formatarMoeda($dadosjson->XRPBRL->bid);
        $valorFinalDolar = $this->formatarMoeda($dadosjson->USDBRL->bid);
        $valorFinalEuro = $this->formatarMoeda($dadosjson->EURBRL->bid);


        return view('home')->with(compact('chartjs', 'valorFinalBitcoin', 'valorFinalEtherium', 'valorFinalXRP', 'valorFinalDolar', 'valorFinalEuro'));
    }

    public function formatarMoeda($valor)
    {
        $valorFormatado = number_format($valor, 2, ',', '.');
        $valorFinal = "R$" . $valorFormatado;
        return $valorFinal;
    }
}
