
var dataService = function () {
    var urlBase = window.location.origin,

//    getAllUsers = function() {
//        return $.getJSON(urlBase + '/all-users');
//    },

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
    },

    validateAllInputs = function() {
        return $.ajax({
            url: urlBase + '/validate-inputs',
            type: 'post',
            data: $('#applicant-form').serialize()
        });
    };

//    validateAddUser = function() {
//        return $.ajax({
//            url: urlBase + '/admin/validate-add-user',
//            type: 'post',
//            data: $('#add-user-form').serialize()
//        });
//    };
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
//        getAllUsers: getAllUsers,
        processorLogin: processorLogin,
        adminLogin: adminLogin,
        validateAllInputs: validateAllInputs,
//        validateAddUser: validateAddUser
    };
}();
