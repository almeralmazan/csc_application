
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

            $('#search-control-no-form').on('submit', function(e) {
                e.preventDefault();

                var controlNumber = $('#control-number-field').val();

                getApplicantStatus(controlNumber);
            });

            // delete user
            $('.delete-user').on('click', function() {
                var name = $(this).data('name'),
                    id = $(this).data('id');

                bootbox.confirm(
                    'Are you sure you want to delete <strong>' + name + '</strong>?',
                    function(accept) {
                        if (accept) {
                            location.href = '/admin/delete/user/' + id;
                        }
                    }
                );
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
        },

        getApplicantStatus = function(controlNumber) {
            dataService.getApplicantStatus(controlNumber)
                .done( function(data) {

                    var paidOrNotPaid = data.message[0].applicant_status;
                    var fullName = data.message[0].applicant_first_name + ' ' +
                                    data.message[0].applicant_last_name;

                    if (data.success) {

                        if (paidOrNotPaid === 1) {
                            $('#status-container #status-paid').text('Paid');
                        } else {
                            $('#status-container #status-paid').text('Not Paid');
                        }

                        $('#status-container #applicant-name').text(fullName);
                        $('#status-container #schedule-date-start').text(
                            moment(data.message[0].schedule_date_start)
                                .format('MMMM D, YYYY')
                        );
                    } else {
                        $('#status-container #status-paid').text('No results');
                        $('#status-container #applicant-name').text('No results');
                        $('#status-container #schedule-date-start').text('No results');
                    }
                })
                .fail( function(jqXHR, textStatus, error) {
                    console.log(textStatus);
                });
        },

        deleteUser = function(userId) {
            dataService.deleteUser(userId)
                .done( function(data) {
                    console.log('Deleted user successfully!');
                })
                .fail( function(jqXHR, textStatus, error) {
                    console.log(textStatus);
                });
        };

    return {
        init: init
    };
}();

controllerPage.init();
