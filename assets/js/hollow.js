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
    };
});