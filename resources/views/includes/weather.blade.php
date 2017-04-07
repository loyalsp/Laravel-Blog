
<script type="text/javascript">
    $( document ).ready(function() {
        $.ajax({
            type: 'GET',
            url: "http://api.openweathermap.org/data/2.5/weather?appid=d64a154c314abec09ac7dc97fa668e1d",
            data: {lat: "{{$data['lat']}}", lon: "{{$data['lon']}}"},

            success: function (data) {

                var obj = JSON.parse(JSON.stringify(data));
                document.getElementById("temp").innerHTML = "Max temp: "+obj.main.temp+" &deg;C";
                document.getElementById("city").innerHTML = "City: "+obj.name;
                document.getElementById("humidity").innerHTML = obj.main.humidity;
                document.getElementById("wind-speed").innerHTML = "Wind speed: "+obj.wind.speed+" mph";
                document.getElementById("country").innerHTML = "Country Code: "+obj.sys.country;
            },
            error: function (x, y, z) {
                alert(x.responseText + "  " + x.status);
            }
        });
    });
</script>

    <section class="weather">

        <div id="temp"></div>
        <div id="wind-speed"></div>
        <div id="city"></div>
        <div id="country"></div>
        <div id="humidity"></div>

</section>