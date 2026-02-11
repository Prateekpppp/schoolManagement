
    <style>
        .school-header {
            text-align: center;
            margin-top: 10px;
        }
        img {
            height: fit-content !important;
        }
    </style>
    <div class="school-header">
        <div class="flex flex-row gap-4">
            <img src="{{asset('/').$appdata->logo}}" alt="logo" width="100px">
            <div>
                <h2>{{$appdata->title}}</h2>
                <p>{{$appdata->address}} - {{$appdata->phone}}</p>
            </div>
        </div>
    </div>