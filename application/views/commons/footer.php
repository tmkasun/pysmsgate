<div class="footer-bottom">

    <span class="footer-left">
        <a>About</a>
    </span>

    <span class="footer-right">
        <a>Privacy</a>
        <a style="padding: 0 0 0 27px !important;" onclick="$('#commonModal').modal('show').find('.modal-content').load('/system_tools/terms');return false">Terms</a>
        <a style="padding: 0 0 0 27px !important;color: #dbced3;" onclick="$('#commonModal').modal('show').find('.modal-content').load('/system_tools/feedback_form');return false"><span style="color: #990000;">Feedback </span><i class="fa fa-paper-plane-o"></i></a>
    </span>
</div>
<!-- General modal placeholder -->
<div class="modal" id="commonModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- This content is load by $.ajax call , pages are located at '/controllers/modals/' -->
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
</body>
</html>
