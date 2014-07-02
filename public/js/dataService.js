
var dataService = function () {
    var urlBase = window.location.origin,

//        adminLogin = function() {
//            return $.post(urlBase + '/admin/login');
//        };

        processorLogin = function() {
            return $.ajax({
                url: urlBase + '/processor/login',
                type: 'post',
                data: $('#processor-form').serialize()
            });
        },

        adminLogin = function() {
            return $.ajax({
                url: urlBase + '/admin/login',
                type: 'post',
                data: $('#admin-form').serialize()
            });
        };
//
//        getMovieId = function(id) {
//            return $.getJSON(urlBase + '/movie/' + id);
//        },
//
//        getReservedSeats = function(movieId, timeId) {
//            return $.getJSON(urlBase + '/member/movie/' + movieId + '/' + timeId);
//        },

//        saveAdminReservedSeats = function(seatsArray, movieId, timeId, customerName) {
//            return $.ajax({
//                url: urlBase + '/admin/save-reserved-seats',
//                data: {
//                    adminReservedSeats: seatsArray,
//                    movieId: movieId,
//                    timeId: timeId,
//                    customerName: customerName
//                },
//                type: 'POST'
//            });
//        },

//        saveReservedSeats = function(seatsArray, movieId, timeId) {
//            return $.ajax({
//                url: urlBase + '/member/save-reserved-seats',
//                data: { reservedSeats: seatsArray, movieId: movieId, timeId: timeId },
//                type: 'POST'
//            });
//        }

    // checkinParticipant = function(id) {
    //     return $.ajax({
    //         url: urlBase + '/participants/' + id + '/checkin',
    //         type: 'POST'
    //     });
    // },

    return {
        processorLogin: processorLogin,
        adminLogin: adminLogin
    };
}();
