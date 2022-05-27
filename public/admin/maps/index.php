<div class='panel panel-border panel-primary' role="navigation">
    <div class='panel-heading'>
    <h3 class='panel-title'><i class='fa fa-map-marker'></i> Google Maps</h3> 
</div> 
<!-- <div class="text-center">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126936.97153029419!2d106.68721864745973!3d-6.160164032609576!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f7c9d110d719%3A0x300c5e82dd4b8a0!2sJakarta%20Barat%2C%20Kec.%20Kb.%20Jeruk%2C%20Kota%20Jakarta%20Barat%2C%20Daerah%20Khusus%20Ibukota%20Jakarta!5e0!3m2!1sid!2sid!4v1609517567549!5m2!1sid!2sid" width="250" height="250" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
<br/>
              <a href="https://maps.google.com" >  Ke Maps Browser
            </div> -->


            <iframe id="frame-map" src="https://maps.google.com/maps?q=Surabaya&t=&z=13&ie=UTF8&iwloc=&output=embed" width="100%"
                height="380" frameborder="0" style="border:0" allowfullscreen>
            </iframe>
            

            <script>
    var track = {
      // (B) PROPERTIES
      map : null, // HTML map
      delay : 10000, // Delay between location refresh

      // (C) INIT
      init : () => {
        track.map = document.getElementById("map");
        track.show();
        setInterval(track.show, track.delay);
      },

      // (D) GET DATA FROM SERVER AND UPDATE MAP
      show : () => {
        // (D1) DATA
        var data = new FormData();
        data.append("req", "getAll");

        // (D2) AJAX FETCH
        fetch("maps/adminpanel.php", { method:"POST", body:data })
        .then(res => res.json()).then((res) => {
          if (res.status==1) { for (let rider of res.message) {
            var row = document.createElement("div");
            row.innerHTML = "Rider ID " + rider.rider_id +
                            " | Lng " + rider.track_lng +
                            " | Lat " + rider.track_lat +
                            " | Time " + rider.track_time;

                            
          $('#frame-map').attr('src',`https://maps.google.com/maps?q=${rider.track_lat},${rider.track_lng}&t=&z=16&ie=UTF8&iwloc=&output=embed`);
            track.map.appendChild(row);
          }} else { track.map.innerHTML = res.message; }




        }).catch((err) => { console.error(err); });
      }
    };
    window.addEventListener("DOMContentLoaded", track.init);
    </script>