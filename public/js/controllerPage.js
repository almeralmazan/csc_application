
var controllerPage = function() {

    var urlBase = window.location.origin;

    var init = function() {

            $('#processor-form').on('submit', function(e) {
                e.preventDefault();

                getProcessorLoginInputs();
            });

            $('#admin-form').on('submit', function(e) {
                e.preventDefault();

                getAdminLoginInputs();
            });

            $('#btn-add-schedule').on('click', function() {
                var locationId = $('#testing-center-location').val();

                getAvailableScheduleForOneLocation(locationId);
            });

            $(document).on('click', 'span.selected-schedule', function() {
                var scheduleId = $(this).attr('id');

                var pickeDateStart = '#picked-date-start-'+ scheduleId;
                var pickeTimeStart = '#picked-time-start-' + scheduleId;
                var pickeTimeEnd = '#picked-time-end-' + scheduleId;

                var date_start = $(pickeDateStart).text();
                var time_start = $(pickeTimeStart).text();
                var time_end = $(pickeTimeEnd).text();

                $("#date-start").val(date_start);
                $("#time-start").val(time_start);
                $("#time-end").val(time_end);
            });
        },

        getProcessorLoginInputs = function() {
            dataService.processorLogin()
                .done( function(data) {
                    if ( ! data.success) {
                        $('.login-error')
                            .addClass('alert alert-danger')
                            .text(data.message);
                    } else {
                        window.location.href = urlBase + '/processor';
                    }
                })
                .fail( function(jqXHR, textStatus, error) {
                    console.log(textStatus);
                });
        },

        getAdminLoginInputs = function() {
            dataService.adminLogin()
                .done( function(data) {
                    if ( ! data.success) {
                        $('.login-error')
                            .addClass('alert alert-danger')
                            .text(data.message);
                    } else {
                        window.location.href = urlBase + '/admin';
                    }
                })
                .fail( function(jqXHR, textStatus, error) {
                   console.log(textStatus);
                });
        },

        getAvailableScheduleForOneLocation = function(locationId) {
            dataService.getAvailableScheduleForOneLocation(locationId)
                .done( function(data) {

                    var container = $('table tbody');
                    var html = '';

                    if (data) {

                        for (var i = 0; i < data.length; i++) {
                            html += "<tr>"
                            html += "<td><span id=" + data[i].id + " class='btn-sm btn-picker selected-schedule' data-dismiss='modal'>Pick this!</span></td>";
                            html += "<td id='picked-date-start-" + data[i].id + "'>" + data[i].date_start + "</td>";
                            html += "<td id='picked-time-start-" + data[i].id + "'>" + data[i].time_start + "</td>";
                            html += "<td id='picked-time-end-" + data[i].id + "'>" + data[i].time_end + "</td>";
                            html += "</tr>";
                        }
                    } else {
                        container.html('No')
                    }

                    container.html(html);
                })
                .fail(function(jqXHR, textStatus, error) {
                    console.log(textStatus);
                });
        };

//        validateAllInputs = function() {
//            dataService.validateAllInputs()
//                .done( function(data) {
//
//                    var errorsContainer = $('#error-message');
//                    var ulContainer = $('ul#list-of-errors');
//                    var result = '';
//
//                    if ( ! data.success) {
//                        $.each(data.message, function(index, value) {
//                            result += '<li>' + value + '</li>';
//                        });
//
//                        errorsContainer.addClass('alert alert-danger');
//                        ulContainer.html(result);
//
//                        window.parent.scrollTo(0,0);
//
//                    } else {
//                        window.location.href = urlBase + '/applicant-success-page';
//                    }
//                })
//                .fail( function(jqXHR, textStatus, error) {
//                    console.log(textStatus);
//                });
//        },

//        validateAddUser = function() {
//            dataService.validateAddUser()
//                .done( function(data) {
//
//                    var errorsContainer = $('#add-user-error-message');
//                    var ulContainer = $('ul#list-of-errors');
//                    var result = '';
//
//                    if ( ! data.success) {
//                        $.each(data.message, function(index, value) {
//                            result += '<li>' + value + '</li>';
//                        });
//
//                        errorsContainer.addClass('alert alert-danger');
//                        ulContainer.html(result);
//
//                    } else {
//                        errorsContainer.removeClass('alert-danger')
//                        errorsContainer.addClass('alert-success');
//
//                        $('#name').val('');
//                        $('#username').val('');
//                        $('#password').val('');
//                        $('#password_confirmation').val('');
//
//                        errorsContainer.html(data.message);
//                    }
//                })
//                .fail( function(jqXHR, textStatus, error) {
//                    console.log(textStatus);
//                });
//        };

    return {
        init: init
    };
}();

controllerPage.init();
