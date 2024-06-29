@extends('layouts.app')

@section('content')
<div class="container-fluid d-flex flex-direction-row">
    <!-- Sidebar -->
    <aside class="sidebar">
        <nav>
            <ul>
                <div class="d-flex align-items-center gap-2 ">
                    <i class="bi bi-grid-fill p-2"></i>
                    <li><a href="#">Dashboard</a></li>
                </div>

                <div class="d-flex align-items-center gap-2">
                    <i class="bi bi-coin p-2"></i>
                    <li><a href="#">Mercado</a></li>
                </div>

                <div class="d-flex align-items-center gap-2">
                    <i class="bi bi-wallet2 p-2"></i>
                    <li><a href="#">Carteira</a></li>
                </div>

                <div class="d-flex align-items-center gap-2">
                    <i class="bi bi-graph-up p-2"></i>
                    <li><a href="#">Análises</a></li>
                </div>

                <div class="d-flex align-items-center gap-2">
                    <i class="bi bi-clock-history p-2"></i>
                    <li><a href="#">Histórico</a></li>
                </div>

                <div class="d-flex align-items-center gap-2">
                    <i class="bi bi-envelope p-2"></i>
                    <li><a href="#">Mensagens</a></li>
                </div>

                <div class="d-flex align-items-center gap-2">
                    <i class="bi bi-question-circle p-2"></i>
                    <li><a href="#">Ajuda</a></li>
                </div>

                <div class="d-flex align-items-center gap-2">
                    <i class="bi bi-gear p-2"></i>
                    <li><a href="#">Configurações</a></li>
                </div>
            </ul>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="main-content d-flex justify-content-evenly">

        <div>
            <!-- Current Balance -->
            <section class="current-balance">
                <h2>Balanço Atual</h2>
                <div class="balance-amount">$78,564.34</div>
                <div class="coins">
                    <div class="coin">Binance: $4,550</div>
                    <div class="coin">Ethereum: $4,550</div>
                    <div class="coin">Litecoin: $4,550</div>
                </div>
            </section>



            <!-- Overview -->
            <section class="overview">
                <h2>Gráfico</h2>

                <div>
                    {{$chartjs->render()}}
                </div>
            </section>

            <!-- Transactions -->
            <section class="transactions">
                <h2>Transações</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Coin</th>
                            <th>Date</th>
                            <th>Change</th>
                            <th>Market Cap</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Bitcoin</td>
                            <td>Sep 23, 2023</td>
                            <td>+12.93%</td>
                            <td>$3.535M</td>
                            <td>Completed</td>
                        </tr>
                        <!-- Add more rows as needed -->
                    </tbody>
                </table>
            </section>
        </div>


        <div>
            <!-- Your Wallet -->
            <section class="your-wallet">
                <h2>Sua Carteira</h2>
                <div class="wallet-info">
                    <div>
                        <label for="amount-usd">Quantidade (USD)</label>
                        <input type="text" id="amount-usd" value="23,54,200">
                    </div>
                    <div>
                        <label for="amount-btc">Quantidade (BTC)</label>
                        <input type="text" id="amount-btc" value="3.43456">
                    </div>
                </div>
                <button class="connect-wallet">Afiliar Carteira</button>
            </section>

            <!-- MarketCap -->
            <section class="market-cap">
                <h2>Valor de Mercado</h2>
                <ul>
                    <li>BTC: {{$valorFinalBitcoin}}</li>
                    <li>ETH: {{$valorFinalEtherium}}</li>
                    <li>XRP: {{$valorFinalXRP}}</li>
                    <li>USD: {{$valorFinalDolar}}</li>
                    <li>EUR: {{$valorFinalEuro}}</li>
                </ul>
            </section>
        </div>
    </main>
</div>
@endsection