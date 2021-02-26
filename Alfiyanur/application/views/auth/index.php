<head>
    <title>Login Form</title>

</head>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<style type="text/css">
    body {
        background: url('<?php echo base_url(); ?>/assets/dist/img/file.jpg') no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        background-size: cover;
    }
</style>

<body>
    <div class="container">
        <div id="loginbox" style="margin-top:20%;" class="mainbox col-md-4 col-md-offset-4 col-sm- col-sm-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="panel-title">My File Login</div>
                </div>
                <div style="padding-top:15px" class="panel-body">
                    <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div><?php echo $this->session->flashdata('msg'); ?>
                    <form action="<?php echo base_url('auth'); ?>" method="post">
                        <div style="margin-top: 15px" class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input id="login-username" type="text" class="form-control" name="username" value="<?php echo set_value('username'); ?>" placeholder="username"></div>
                        <?php echo form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>

                        <div style="margin-top: 15px" class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input id="login-password" type="password" class="form-control" name="password" placeholder="password"></div>
                        <?php echo form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                        <div style="margin-top:15px;" class="form-group">
                            <button type="submit" class="btn btn-primary btn-sm btn-block pull-right"><i class="fa fa-sign-in"></i> Login </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>