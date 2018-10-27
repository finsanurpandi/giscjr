$(document).ready(function(){
    // function clearMenuAdmin()
    // {
    //     $('#menuDashboard').removeClass('active');
    //     $('#menuMaster').removeClass('active');
    //     $('#menuLokasi').removeClass('active');
    //     $('#menuKategori').removeClass('active');
    //     $('#menuStatistik').removeClass('active');
    // }

    if (uri == 'dashboard') {
        $('#menuDashboard').addClass('active');
    } else if (uri == 'lokasi') { 
        $('#menuMaster').addClass('active');
        $('#menuLokasi').addClass('active');
    } else if (uri == 'kategori') { 
        $('#menuMaster').addClass('active');
        $('#menuKategori').addClass('active');
    } else if (uri == 'statistik') {
        $('#menuStatistik').addClass('active');
        $('#menuAllData').addClass('active');
    } else if (uri == 'pendidikan') {
        $('#menuStatistik').addClass('active');
        $('#menuStPendidikan').addClass('active');
    }

    $('#modalInputLokasi').on('hidden.bs.modal', function (e) {
        $(this)
          .find("input,textarea,select")
             .val('')
             .end()
          .find("input[type=checkbox], input[type=radio]")
             .prop("checked", "")
             .end()
          .find('#iconType option')
            .remove()
            .end()
          .find('#subCategory option')
            .remove()
            .end();
      })
    
    $('#subCategory option').remove();
    $('#iconType option').remove();
});

$(document).on( "click", '.detailLokasi',function(e) {
    let detail = $(this).data();
    $('.detail').html(
        "<strong style='font-size:20px'>"+detail['name']+"</strong><br/>"
        +detail['address']+"<br/>"
        +"Kecamatan: "+detail['district']+"<br/>"
        +"Kategori: "+detail['category']+"<br/>"
        +"Sub Kategori: "+detail['sub']+"<br/>"
        +"Latitude: "+detail['lat']+"<br/>"
        +"Longitude: "+detail['lng']+"<br/>"
    );

    initMap(detail);
});

$(document).on( "click", '.editLokasi',function(e) {
    let detail = $(this).data();
    
    $('.nameLocation').val(detail['name']);
    $('.addressLocation').val(detail['address']);
    $('.latLocation').val(detail['lat']);
    $('.lngLocation').val(detail['lng']);

    $('.districtLocation option').filter(function(){
		return ($(this).val() == detail['district']);
    }).prop('selected', true);
    
    $('.categoryLocation option').filter(function(){
		return ($(this).val() == detail['category']);
    }).prop('selected', true);
    
    editSubCategory();


});

$(document).on("click", '.accepted', function(e){
    let detail = $(this).data();

    $('.idlocationaccepted').val(detail['id']);
    console.log(detail['id']);
});

$(document).on("click", '.denied', function(e){
    let detail = $(this).data();

    $('.idlocationdenied').val(detail['id']);
    console.log(detail['id']);
});

function initMap(detail) {
    let lat = parseFloat(detail['lat']);
    let lng = parseFloat(detail['lng']);
    
    let myCenter = new google.maps.LatLng(lat, lng);
      let mapDiv = document.getElementById('mapModal');
      let map = new google.maps.Map(mapDiv, {
        center: myCenter,
        zoom: 16,
        zoomControl: true,
      });

      var marker = new google.maps.Marker({
          position: myCenter,
      });

      marker.setMap(map);
}

function selectSubCategory()
{
    $('#subCategory option').remove();

    $('#subCategory').prop('disabled', false);

    let pemerintahan = [{'value' : 'Kantor Dinas', 'text' : 'Kantor Dinas'},
        {'value' : 'Kantor Kecamatan', 'text' : 'Kantor Kecamatan'},
        {'value' : 'Pelayanan Umum', 'text' : 'Pelayanan Umum'},
        {'value' : 'BUMD', 'text' : 'BUMD'}
    ];

    let pendidikan = [{'value' : 'SD', 'text' : 'SD'},
        {'value' : 'SMP', 'text' : 'SMP'},
        {'value' : 'SMA/SMK', 'text' : 'SMA/SMK'},
        {'value' : 'Perguruan Tinggi', 'text' : 'Perguruan Tinggi'}
    ];

    let kesehatan = [{'value' : 'Rumah Sakit', 'text' : 'Rumah Sakit'},
        {'value' : 'Puskesmas', 'text' : 'Puskesmas'}
    ];

    let pariwisata = [{'value' : 'Pariwisata', 'text' : 'Pariwisata'}
    ];

    let bidangUsaha = [{'value' : 'Kuliner', 'text' : 'Kuliner'},
        {'value' : 'Perbankan', 'text' : 'Perbankan'},
        {'value' : 'UMKM', 'text' : 'UMKM'},
        {'value' : 'Penginapan', 'text' : 'Penginapan'},
        {'value' : 'Ritel', 'text' : 'Ritel'}
    ];

    let sarana = [{'value' : 'Sarana Prasarana', 'text' : 'Sarana Prasarana'}
    ];

    var category = $('#category').find(":selected").text();

    if (category == 'Pemerintahan') {
        $('#subCategory').append($('<option></option'));
        $.each(pemerintahan, function(i){
            $('#subCategory').append($('<option></option>')
  				.attr('value', pemerintahan[i]['value'])
  				.text(pemerintahan[i]['text']));
        });
    } else if (category == 'Pendidikan') {
        $('#subCategory').append($('<option></option'));
        $.each(pendidikan, function(i){
            $('#subCategory').append($('<option></option>')
  				.attr('value', pendidikan[i]['value'])
  				.text(pendidikan[i]['text']));
        });
    } else if (category == 'Kesehatan') {
        $('#subCategory').append($('<option></option'));
        $.each(kesehatan, function(i){
            $('#subCategory').append($('<option></option>')
  				.attr('value', kesehatan[i]['value'])
  				.text(kesehatan[i]['text']));
        });
    } else if (category == 'Pariwisata') {
        $('#subCategory').append($('<option></option'));
        $.each(pariwisata, function(i){
            $('#subCategory').append($('<option></option>')
  				.attr('value', pariwisata[i]['value'])
  				.text(pariwisata[i]['text']));
        });
    } else if (category == 'Bidang Usaha') {
        $('#subCategory').append($('<option></option'));
        $.each(bidangUsaha, function(i){
            $('#subCategory').append($('<option></option>')
  				.attr('value', bidangUsaha[i]['value'])
  				.text(bidangUsaha[i]['text']));
        });
    } else if (category == 'Sarana Prasarana') {
        $('#subCategory').append($('<option></option'));
        $.each(sarana, function(i){
            $('#subCategory').append($('<option></option>')
  				.attr('value', sarana[i]['value'])
  				.text(sarana[i]['text']));
        });
    }
}

function selectIconType()
{
    $('#iconType option').remove();
    $('#iconType').prop('disabled', false);

    let kantorDinas = [{'value':'dinas', 'text':'Dinas'}];
    let kecamatan = [{'value':'kecamatan', 'text':'Kecamatan'}];
    let pelayananUmum = [{'value':'polsek', 'text':'Polsek'}, {'value':'umum', 'text':'Umum'}];
    let bumd = [{'value':'bumd', 'text':'BUMD'}];
    let pendidikan = [{'value':'pendidikan', 'text':'Pendidikan'}];
    let rumahSakit = [{'value':'rumah_sakit', 'text':'Rumah Sakit'}];
    let puskesmas = [{'value':'puskesmas', 'text':'Puskesmas'}];
    let pariwisata = [{'value':'pariwisata', 'text':'Pariwisata'}];
    let kuliner = [{'value':'kuliner', 'text':'Kuliner'}];
    let perbankan = [{'value':'perbankan', 'text':'Perbankan'}];
    let umkm = [{'value':'umkm', 'text':'UMKM'}];
    let penginapan = [{'value':'penginapan', 'text':'penginapan'}];
    let ritel = [{'value':'ritel', 'text':'Ritel'}];
    let sarana = [{'value':'sarana', 'text':'Sarana Prasarana'}];

    var subCategory = $('#subCategory').find(":selected").text();

    if (subCategory == 'Kantor Dinas') {
        $.each(kantorDinas, function(i){
            $('#iconType').append($('<option></option>')
  				.attr('value', kantorDinas[i]['value'])
  				.text(kantorDinas[i]['text']));
        });
    } else if (subCategory == 'Kantor Kecamatan') {
        $.each(kecamatan, function(i){
            $('#iconType').append($('<option></option>')
  				.attr('value', kecamatan[i]['value'])
  				.text(kecamatan[i]['text']));
        });
    } else if (subCategory == 'Pelayanan Umum') {
        $.each(pelayananUmum, function(i){
            $('#iconType').append($('<option></option>')
  				.attr('value', pelayananUmum[i]['value'])
  				.text(pelayananUmum[i]['text']));
        });
    } else if (subCategory == 'BUMD') {
        $.each(bumd, function(i){
            $('#iconType').append($('<option></option>')
  				.attr('value', bumd[i]['value'])
  				.text(bumd[i]['text']));
        });
    } else if (subCategory == 'SD' || subCategory == 'SMP' || subCategory == 'SMA/SMK' || subCategory == 'Perguruan Tinggi') {
        $.each(pendidikan, function(i){
            $('#iconType').append($('<option></option>')
  				.attr('value', pendidikan[i]['value'])
  				.text(pendidikan[i]['text']));
        });
    } else if (subCategory == 'Rumah Sakit') {
        $.each(rumahSakit, function(i){
            $('#iconType').append($('<option></option>')
  				.attr('value', rumahSakit[i]['value'])
  				.text(rumahSakit[i]['text']));
        });
    } else if (subCategory == 'Puskesmas') {
        $.each(puskesmas, function(i){
            $('#iconType').append($('<option></option>')
  				.attr('value', puskesmas[i]['value'])
  				.text(puskesmas[i]['text']));
        });
    } else if (subCategory == 'Pariwisata') {
        $.each(pariwisata, function(i){
            $('#iconType').append($('<option></option>')
  				.attr('value', pariwisata[i]['value'])
  				.text(pariwisata[i]['text']));
        });
    } else if (subCategory == 'Kuliner') {
        $.each(kuliner, function(i){
            $('#iconType').append($('<option></option>')
  				.attr('value', kuliner[i]['value'])
  				.text(kuliner[i]['text']));
        });
    } else if (subCategory == 'Perbankan') {
        $.each(perbankan, function(i){
            $('#iconType').append($('<option></option>')
  				.attr('value', perbankan[i]['value'])
  				.text(perbankan[i]['text']));
        });
    } else if (subCategory == 'UMKM') {
        $.each(umkm, function(i){
            $('#iconType').append($('<option></option>')
  				.attr('value', umkm[i]['value'])
  				.text(umkm[i]['text']));
        });
    } else if (subCategory == 'Penginapan') {
        $.each(penginapan, function(i){
            $('#iconType').append($('<option></option>')
  				.attr('value', penginapan[i]['value'])
  				.text(penginapan[i]['text']));
        });
    } else if (subCategory == 'Ritel') {
        $.each(ritel, function(i){
            $('#iconType').append($('<option></option>')
  				.attr('value', ritel[i]['value'])
  				.text(ritel[i]['text']));
        });
    } else if (subCategory == 'Sarana Prasarana') {
        $.each(sarana, function(i){
            $('#iconType').append($('<option></option>')
  				.attr('value', sarana[i]['value'])
  				.text(sarana[i]['text']));
        });
    };
}

function editSubCategory(vale = '')
{

    $('#editSubCategory option').remove();

    $('#editSubCategory').prop('disabled', false);

    let pemerintahan = [{'value' : 'Kantor Dinas', 'text' : 'Kantor Dinas'},
        {'value' : 'Kantor Kecamatan', 'text' : 'Kantor Kecamatan'},
        {'value' : 'Pelayanan Umum', 'text' : 'Pelayanan Umum'},
        {'value' : 'BUMD', 'text' : 'BUMD'}
    ];

    let pendidikan = [{'value' : 'SD', 'text' : 'SD'},
        {'value' : 'SMP', 'text' : 'SMP'},
        {'value' : 'SMA/SMK', 'text' : 'SMA/SMK'},
        {'value' : 'Perguruan Tinggi', 'text' : 'Perguruan Tinggi'}
    ];

    let kesehatan = [{'value' : 'Rumah Sakit', 'text' : 'Rumah Sakit'},
        {'value' : 'Puskesmas', 'text' : 'Puskesmas'}
    ];

    let pariwisata = [{'value' : 'Pariwisata', 'text' : 'Pariwisata'}
    ];

    let bidangUsaha = [{'value' : 'Kuliner', 'text' : 'Kuliner'},
        {'value' : 'Perbankan', 'text' : 'Perbankan'},
        {'value' : 'UMKM', 'text' : 'UMKM'},
        {'value' : 'Penginapan', 'text' : 'Penginapan'},
        {'value' : 'Ritel', 'text' : 'Ritel'}
    ];

    let sarana = [{'value' : 'Sarana Prasarana', 'text' : 'Sarana Prasarana'}
    ];

    var category = $('#editCategory').find(":selected").text();

    if (category == 'Pemerintahan') {
        $.each(pemerintahan, function(i){
            $('#editSubCategory').append($('<option></option>')
  				.attr('value', pemerintahan[i]['value'])
  				.text(pemerintahan[i]['text']));
        });
    } else if (category == 'Pendidikan') {
        $.each(pendidikan, function(i){
            $('#editSubCategory').append($('<option></option>')
  				.attr('value', pendidikan[i]['value'])
  				.text(pendidikan[i]['text']));
        });
    } else if (category == 'Kesehatan') {
        $('#editSubCategory').append($('<option></option'));
        $.each(kesehatan, function(i){
            $('#editSubCategory').append($('<option></option>')
  				.attr('value', kesehatan[i]['value'])
  				.text(kesehatan[i]['text']));
        });
    } else if (category == 'Pariwisata') {
        $('#editSubCategory').append($('<option></option'));
        $.each(pariwisata, function(i){
            $('#editSubCategory').append($('<option></option>')
  				.attr('value', pariwisata[i]['value'])
  				.text(pariwisata[i]['text']));
        });
    } else if (category == 'Bidang Usaha') {
        $('#editSubCategory').append($('<option></option'));
        $.each(bidangUsaha, function(i){
            $('#editSubCategory').append($('<option></option>')
  				.attr('value', bidangUsaha[i]['value'])
  				.text(bidangUsaha[i]['text']));
        });
    } else if (category == 'Sarana Prasarana') {
        $('#editSubCategory').append($('<option></option'));
        $.each(sarana, function(i){
            $('#editSubCategory').append($('<option></option>')
  				.attr('value', sarana[i]['value'])
  				.text(sarana[i]['text']));
        });
    }
}