
var dataService = function () {
    var urlBase = window.location.origin,

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
    },

    getAvailableScheduleForOneLocation = function(locationId) {
        return $.getJSON(urlBase + '/available-schedules/' + locationId);
    },

    getListOfPassers = function(searchQuery, dateOfExam, examLevel) {
        return $.getJSON(urlBase + '/list-of-passers/' + searchQuery + '/' + dateOfExam + '/' + examLevel);
    },

    getApplicantStatus = function(controlNumber) {
        return $.getJSON(urlBase + '/search-control-no/' + controlNumber);
    },

    deleteSchedule = function(scheduleId, testingCenterId) {
        return $.getJSON(urlBase + '/admin/delete/schedule/' + scheduleId + '/test-center/' + testingCenterId);
    },

    deleteUser = function(userId) {
        return $.getJSON(urlBase + '/admin/delete/user/' + userId);
    };


    return {
        processorLogin: processorLogin,
        adminLogin: adminLogin,
        validateAllInputs: validateAllInputs,
        getAvailableScheduleForOneLocation: getAvailableScheduleForOneLocation,
        getListOfPassers: getListOfPassers,
        getApplicantStatus: getApplicantStatus,
        deleteSchedule: deleteSchedule,
        deleteUser: deleteUser
    };
}();
