$(document).ready(function(){
    function clearMenu(){
        $('#menuCianjur').removeClass('active');
        $('#pemerintahan').removeClass('active');
        $('#menuDinas').removeClass('active');
        $('#menuKecamatan').removeClass('active');
        $('#menuUmum').removeClass('active');
        $('#menuBumd').removeClass('active');
        $('#menuSd').removeClass('active');
        $('#menuSmp').removeClass('active');
        $('#menuSma').removeClass('active');
        $('#menuPt').removeClass('active');
        $('#menuRs').removeClass('active');
        $('#menuPuskesmas').removeClass('active');
        $('#menuPariwisata').removeClass('active');
        $('#menuKuliner').removeClass('active');
        $('#menuPerbankan').removeClass('active');
        $('#menuUmkm').removeClass('active');
        $('#menuPenginapan').removeClass('active');
        $('#menuSarana').removeClass('active');
    }

    $(document).on('click', '#cianjur', function(e){
        $.ajax({
            url: baseurl+"ajax/cianjur",
            async: true,
            dataType: 'json',
            success: function(data){
                initMap(data);
            }
        });
        clearMenu();
        $('#menuCianjur').addClass('active');
    });

    $(document).on('click', '#kantorDinas', function(e){
        $.ajax({
            url: baseurl+"ajax/kantorDinas",
            async: true,
            dataType: 'json',
            success: function(data){
                initMap(data);
            }
        });
        clearMenu();
        $('#pemerintahan').addClass('active');
        $('#menuDinas').addClass('active');
    });

    $(document).on('click', '#kantorKecamatan', function(e){
        $.ajax({
            url: baseurl+"ajax/kantorKecamatan",
            async: true,
            dataType: 'json',
            success: function(data){
                initMap(data);
            }
        });
        clearMenu();
        $('#pemerintahan').addClass('active');
        $('#menuKecamatan').addClass('active');
    });

    $(document).on('click', '#pelayananUmum', function(e){
        $.ajax({
            url: baseurl+"ajax/pelayananUmum",
            async: true,
            dataType: 'json',
            success: function(data){
                initMap(data);
            }
        });

        clearMenu();
        $('#pemerintahan').addClass('active');
        $('#menuUmum').addClass('active');
    });

    $(document).on('click', '#bumd', function(e){
        $.ajax({
            url: baseurl+"ajax/bumd",
            async: true,
            dataType: 'json',
            success: function(data){
                initMap(data);
            }
        });

        clearMenu();
        $('#pemerintahan').addClass('active');
        $('#menuBumd').addClass('active');
    });

    $(document).on('click', '#sekolahDasar', function(e){
        $.ajax({
            url: baseurl+"ajax/sekolahDasar",
            async: true,
            dataType: 'json',
            success: function(data){
                initMap(data);
            }
        });

        clearMenu();
        $('#pendidikan').addClass('active');
        $('#menuSd').addClass('active');
    });

    $(document).on('click', '#smp', function(e){
        $.ajax({
            url: baseurl+"ajax/smp",
            async: true,
            dataType: 'json',
            success: function(data){
                initMap(data);
            }
        });

        clearMenu();
        $('#pendidikan').addClass('active');
        $('#menuSmp').addClass('active');
    });

    $(document).on('click', '#sma', function(e){
        $.ajax({
            url: baseurl+"ajax/sma",
            async: true,
            dataType: 'json',
            success: function(data){
                initMap(data);
            }
        });

        clearMenu();
        $('#pendidikan').addClass('active');
        $('#menuSma').addClass('active');
    });

    $(document).on('click', '#pt', function(e){
        $.ajax({
            url: baseurl+"ajax/perguruanTinggi",
            async: true,
            dataType: 'json',
            success: function(data){
                initMap(data);
            }
        });

        clearMenu();
        $('#pendidikan').addClass('active');
        $('#menuPt').addClass('active');
    });

    $(document).on('click', '#rs', function(e){
        $.ajax({
            url: baseurl+"ajax/rumahSakit",
            async: true,
            dataType: 'json',
            success: function(data){
                initMap(data);
            }
        });

        clearMenu();
        $('#menuRs').addClass('active');
    });

    $(document).on('click', '#puskesmas', function(e){
        $.ajax({
            url: baseurl+"ajax/puskesmas",
            async: true,
            dataType: 'json',
            success: function(data){
                initMap(data);
            }
        });

        clearMenu();
        $('#menuPuskesmas').addClass('active');
    });

    $(document).on('click', '#pariwisata', function(e){
        $.ajax({
            url: baseurl+"ajax/pariwisata",
            async: true,
            dataType: 'json',
            success: function(data){
                initMap(data);
            }
        });

        clearMenu();
        $('#menuPariwisata').addClass('active');
    });

    $(document).on('click', '#kuliner', function(e){
        $.ajax({
            url: baseurl+"ajax/kuliner",
            async: true,
            dataType: 'json',
            success: function(data){
                initMap(data);
            }
        });

        clearMenu();
        $('#menuKuliner').addClass('active');
    });

    $(document).on('click', '#perbankan', function(e){
        $.ajax({
            url: baseurl+"ajax/perbankan",
            async: true,
            dataType: 'json',
            success: function(data){
                initMap(data);
            }
        });

        clearMenu();
        $('#menuPerbankan').addClass('active');
    });

    $(document).on('click', '#umkm', function(e){
        $.ajax({
            url: baseurl+"ajax/umkm",
            async: true,
            dataType: 'json',
            success: function(data){
                initMap(data);
            }
        });

        clearMenu();
        $('#menuUmkm').addClass('active');
    });

    $(document).on('click', '#penginapan', function(e){
        $.ajax({
            url: baseurl+"ajax/penginapan",
            async: true,
            dataType: 'json',
            success: function(data){
                initMap(data);
            }
        });

        clearMenu();
        $('#menuPenginapan').addClass('active');
    });

    $(document).on('click', '#sarana', function(e){
        $.ajax({
            url: baseurl+"ajax/sarana",
            async: true,
            dataType: 'json',
            success: function(data){
                initMap(data);
            }
        });

        clearMenu();
        $('#menuSarana').addClass('active');
    });

    $('form').on('submit', function(e){
        e.preventDefault();

        let keyword = $('#searchForm').val();
        
        $.ajax({
            method: 'post',
            url: baseurl+"ajax/search",
            async: true,
            data: {keyword:keyword},
            dataType: 'json',
            success: function(data){
                initMap(data);
            }
        });
    });

    function initMap(features) {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 1.1321033, lng: 119.2250863},
          mapTypeId: 'roadmap'
        });

        let bounds = new google.maps.LatLngBounds();

        var iconBase = 'https://maps.google.com/mapfiles/kml/';
        var icons = {
          dinas: {
            icon: iconBase + 'pal3/icon21.png'
          },
          kecamatan: {
            icon: iconBase + 'pal3/icon31.png'
          },
          bumd: {
            icon: iconBase + 'pal3/icon56.png'
          },
          polsek: {
            icon: iconBase + 'pal2/icon13.png'
          },
          umum: {
            icon: iconBase + 'pal3/icon35.png'
          },
          pendidikan: {
            icon: iconBase + 'pal3/icon23.png'
          },
          rumah_sakit: {
            icon: iconBase + 'pal3/icon38.png'
          },
          puskesmas: {
            icon: iconBase + 'pal3/icon46.png'
          },
          pariwisata: {
            icon: iconBase + 'pal3/icon29.png'
          },
          kuliner: {
            icon: iconBase + 'pal2/icon36.png'
          },
          perbankan: {
            icon: iconBase + 'pal2/icon58.png'
          },
          umkm: {
            icon: iconBase + 'pal3/icon26.png'
          },
          penginapan: {
            icon: iconBase + 'pal2/icon28.png'
          },
          sarana: {
            icon: iconBase + 'pal3/icon48.png'
          }
        };
      
        function addMarker(feature) {
          var marker = new google.maps.Marker({
            position: new google.maps.LatLng(
                parseFloat(feature.lat),
                parseFloat(feature.lng)
            ),
            icon: icons[feature.type].icon,
            map: map
          });

          var content = '<strong>'+feature.name+'</strong>'+
                        '<p>'+feature.address+'</p>';
      
          var infowindow = new google.maps.InfoWindow({
            content: content
          })
      
          marker.addListener('mouseover', function(){
            infowindow.open(map, marker);
          });
      
          marker.addListener('mouseout', function(){
            infowindow.close();
          });

          marker.addListener('click', function(){
            $('#myModal').modal('show');
            $('#myModal').on('shown.bs.modal', function (e) {
                var modal = $(this);
                var title = feature.name;
                var alamat = feature.address;
                var kecamatan = feature.district;
                modal.find('.modal-title').text(title);
                modal.find('.address').html(
                    "<strong>"+title+"</strong><br>"+
                    alamat+"<br>"+
                    "Kecamatan "+kecamatan +"<hr/>"+
                    "Latitude: "+feature.lat +"<br>"+
                    "Longitude: "+feature.lng +"<br>"
                );
              })
          });

          bounds.extend(marker.position);
        }
      
        for (var i = 0, feature; feature = features[i]; i++) {
          addMarker(feature);
        }
      
        // console.log(features);

        google.maps.event.addListener(map, 'zoom_changed', function() {
            zoomChangeBoundsListener = 
                google.maps.event.addListener(map, 'bounds_changed', function(event) {
                    if (this.getZoom() > 15 && this.initialZoom == true) {
                        // Change max/min zoom here
                        this.setZoom(16);
                        this.initialZoom = false;
                    }
                google.maps.event.removeListener(zoomChangeBoundsListener);
            });
        });

        map.initialZoom = true;
        map.fitBounds(bounds);
        map.panToBounds(bounds);
      }

});