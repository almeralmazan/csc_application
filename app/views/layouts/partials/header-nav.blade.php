
<div class="col-md-2">
    <div class="panel-group" id="accordion">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="{{ set_active('/') }}" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                        Home
                    </a>
                </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse in">
                <div class="panel-body">
                    <ul class="list-unstyled">
                        <li><a href="/" class="link-active">News</a></li>
                        <li><a href="/history">History</a></li>
                        <li><a href="/mission-vision">Mission & Vision</a></li>
                        <li><a href="/requirements">Requirements</a></li>
                        <li><a href="/about-us">About Us</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a href="/application-form" class="{{ set_active('application-form') }}">Application</a>
                </h4>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a href="/list-of-passers" class="{{ set_active('list-of-passers') }}">List Of Passers</a>
                </h4>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a href="/payment-status" class="{{ set_active('payment-status') }}">Payment</a>
                </h4>
            </div>
        </div>
    </div>
</div>
