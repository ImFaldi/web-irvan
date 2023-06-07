<link href="css/sb-admin-2.min.css" rel="stylesheet">


<div class="float-left">
    <img src="img/logo.png" alt="" style="width: 100px; height: 100px; margin-left: 40%; margin-top: 5%;">
</div>

<div class="container">
    <div class="row">
        <div class="float-right">
            <img src="img/logo.png" alt="" style="width: 100px; height: 100px; margin-left: 40%; margin-top: 5%;">
        </div>
    </div>
</div>

<hr class="sidebar-divider my-0">

<div class="container">
    <div class="row">
        <div class="float-right">
            <p class="text-left mt-3 text-gray-900">Kepada Yth.<br>
                Pimpinan<br>
        </div>
    </div>

    <div class="row">
        <div style="margin-top: 30%;">
            <p class="text-left mt-3 text-gray-900">Hal : {{ $report->title }}<br>
            <p class="text-left text-gray-900">Dengan Hormat,<br>
                saya
                @foreach ($users as $user)
                    @if ($user->id == $report->user_id)
                        {{ $user->name }}
                    @endif
                @endforeach
                Dengan ini saya sampaikan laporan sebagai berikut :
            </p>
            <p class="text-left text-gray-900">Nama :
                @foreach ($users as $user)
                    @if ($user->id == $report->user_id)
                        {{ $user->name }}
                    @endif
                @endforeach

                <br>

                NPM :
                @foreach ($users as $user)
                    @if ($user->id == $report->user_id)
                        {{ $user->npm }}
                    @endif
                @endforeach

                <br>

                Email :
                @foreach ($users as $user)
                    @if ($user->id == $report->user_id)
                        {{ $user->email }}
                    @endif
                @endforeach

                <br>

                No. HP :
                @foreach ($users as $user)
                    @if ($user->id == $report->user_id)
                        {{ $user->phone }}
                    @endif
                @endforeach

                <br>

                Jenis Kelamin :
                @foreach ($users as $user)
                    @if ($user->id == $report->user_id)
                        {{ $user->phone }}
                    @endif
                @endforeach

                <br>
                <br>
                {{ $report->description }}
            </p>

            <p class="text-left text-gray-900">Demikian laporan ini saya sampaikan, atas perhatiannya saya ucapkan
                terima kasih.</p>
            <div class="float-right">
                <br>
                <br>
                <p class="text-center text-gray-900">Hormat Saya,<br>
                    @foreach ($users as $user)
                        @if ($user->id == $report->user_id)
                            <br>
                            <br>
                            <br>
                            <br>
                            {{ $user->name }}
                        @endif
                    @endforeach
                </p>

            </div>
        </div>
    </div>
</div>
