</div>
<div class="footer text-center container-fluid " >
    <div class="wrapper">
        <div class="section group">
            <div class="col_1_of_4 span_1_of_4">
                <h4>Thành viên </h4>
                <ul style="color: white;">
                    <li><a href="#">Nguyễn Bảo Duy</a></li>
                    <li><a href="#">Nguyễn Công Thành</a></li>
                    <li><a href="#">Võ Công Cảnh</a></li>
                </ul>
            </div>
            <div class="col_1_of_4 span_1_of_4">
                <h4>Mã sinh viên</h4>
                <ul style="color: white;">
                    <li><a href="">1711061034</a></li>
                    <li><a href="">1711062044</a></li>
                    <li><a href="">1711061018</a></li>
                </ul>
            </div>
            <div class="col_1_of_4 span_1_of_4">
                <h4>Số điện thoại liên hệ</h4>
                <ul>
                    <li><a href="">0767022035</a></li>
                   
                </ul>
            </div>
           
        </div>
        <div class="copy_right">
            <p> Đồ án PHP &amp; TCD_IT </p>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        /*
			var defaults = {
	  			containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
	 		};
			*/

        $().UItoTop({
            easingType: 'easeOutQuart'
        });

    });
</script>
<a href="#" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"></span></a>
<link href="css/flexslider.css" rel='stylesheet' type='text/css' />
<script defer src="js/jquery.flexslider.js"></script>
<script type="text/javascript">
    $(function() {
        SyntaxHighlighter.all();
    });
    $(window).load(function() {
        $('.flexslider').flexslider({
            animation: "slide",
            start: function(slider) {
                $('body').removeClass('loading');
            }
        });
    });
</script>
</body>

</html>