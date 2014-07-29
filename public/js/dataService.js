
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
    },

    updateToApproveStatus = function(email) {
        return $.ajax({
            url: urlBase + '/update-approve-status/' + email,
            type: 'get'
        });
    },

    updateToDisapproveStatus = function(email) {
        return $.ajax({
            url: urlBase + '/update-disapprove-status/' + email,
            type: 'get'
        });
    },

    // filter results between two dates
    filterResults = function() {
        return $.ajax({
            url: urlBase + '/admin/filter-results',
            type: 'get',
            data: $('#results-form').serialize()
        });
    };

    return {
        processorLogin: processorLogin,
        adminLogin: adminLogin,
        validateAllInputs: validateAllInputs,
        getAvailableScheduleForOneLocation: getAvailableScheduleForOneLocation,
        getListOfPassers: getListOfPassers,
        getApplicantStatus: getApplicantStatus,
        deleteSchedule: deleteSchedule,
        deleteUser: deleteUser,
        updateToApproveStatus: updateToApproveStatus,
        updateToDisapproveStatus: updateToDisapproveStatus,
        filterResults: filterResults
    };
}();
