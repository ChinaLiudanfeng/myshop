<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>管理员登录</title>

    <!-- BOOTSTRAP STYLES-->
    <link href="/assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="/assets/css/font-awesome.css" rel="stylesheet" />

</head>
<body style="background-color: #E2E2E2;">
<div class="container">
    <div class="row text-center " style="padding-top:100px;">
        <div class="col-md-12">
            <img src="/assets/img/logo-invoice.png" />
        </div>
    </div>
    <div class="row ">

        <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">

            <div class="panel-body">
                <form role="form" action="{{url('admin/logindo')}}" method="post">
                @csrf
                    <hr />
                    <h5>输入要登录的详细信息</h5>
                    <br />
                    <div class="form-group input-group">
                        <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                        <input type="text" name="name" class="form-control" placeholder="账号 " />
                    </div>
                    <div class="form-group input-group">
                        <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                        <input type="password" name="pwd" class="form-control"  placeholder="密码" />
                    </div>
                    <div class="form-group">
                        <label class="checkbox-inline">
                            <input type="checkbox" /> 记住密码
                        </label>
                        <span class="pull-right">
                                                   <a href="#" >忘记密码 ? </a>
                                            </span>
                    </div>

                    <button class="btn btn-primary ">现在登录</button>
                    <hr />
                    没有注册 ? <a href="#" >点击这里 </a> 或者去 <a href="{{url('/')}}">商城首页</a>
                </form>
            </div>

        </div>


    </div>
</div>

</body>
</html>
