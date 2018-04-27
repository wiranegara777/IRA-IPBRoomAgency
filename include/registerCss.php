<style type="text/css">
            /*
    /* Created by Filipe Pina
     * Specific styles of signin, register, component
     */
    /*
     * General styles
     */
    
    
    
    .main{
         margin-top: 25px;
      margin-bottom: 70px;
    }
    
    h1.title { 
        font-size: 35px;
        font-weight: 500; 
    }
    
    h3.title { 
        font-size: 30px; 
        font-weight: 500; 
    }
    
    hr{
    margin-bottom: 0.5px;
    
      border-width: 1.4px;
        width: 30%;
     border-color: #ffff;
    }
    
    .form-group{
        margin-bottom: 15px;
      
    }
    
    label{
        margin-bottom: 15px;
    }
    
    input,
    input::-webkit-input-placeholder {
        font-size: 11px;
        padding-top: 3px;
    }
    
    .main-login{
         background-color: #ffff;
        /* shadows and rounded borders */
        -moz-border-radius: 3px;
        -webkit-border-radius: 3px;
        border-radius: 40px;
        -moz-box-shadow: 5px 3px 3px rgba(0, 0, 0, 1);
        -webkit-box-shadow: 5px 3px 3px rgba(0, 0, 0, 1);
        box-shadow: 0px 4.5px 10px rgba(0, 0, 0, 0.5);
    
    }
    
    .main-center{
         margin-top: 30px;
         margin: 0 auto;
         max-width: 337px;
        padding: 40px 40px;
    
    }
    
    .login-button{
        margin-top: 15px;
      background-color: #008B8B;
    }
    
    .login-register{
        font-size: 15px;
        text-align: center;
    }
    
    a{
      color: #008B8B;
    
    }
    
    footer{
       background-color: #424558;
        position: fixed;
        bottom: 0;
        left: 0;
        right: 0;
        height: 35px;
        text-align: center;
        color: #CCC;
    }
    
    footer p {
        padding: 10.5px;
        margin: 0px;
        line-height: 100%;
    }
    
    [type="radio"]:checked,
[type="radio"]:not(:checked) {
    position: absolute;
    left: -9999px;
}
[type="radio"]:checked + label,
[type="radio"]:not(:checked) + label
{
    position: relative;
    padding-left: 28px;
    padding-top: 8px;
    margin-top: 14px;
    cursor: pointer;
    line-height: 0px;
    display: inline-block;
    color: #666;
}
[type="radio"]:checked + label:before,
[type="radio"]:not(:checked) + label:before {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    width: 18px;
    height: 18px;
    border: 1px solid #ddd;
    border-radius: 100%;
    background: #fff;
}
[type="radio"]:checked + label:after,
[type="radio"]:not(:checked) + label:after {
    content: '';
    width: 12px;
    height: 12px;
    background: #04B4AE;
    position: absolute;
    top: 3px;
    left: 3px;
    border-radius: 100%;
    -webkit-transition: all 0.2s ease;
    transition: all 0.2s ease;
}
[type="radio"]:not(:checked) + label:after {
    opacity: 0;
    -webkit-transform: scale(0);
    transform: scale(0);
}
[type="radio"]:checked + label:after {
    opacity: 1;
    -webkit-transform: scale(1);
    transform: scale(1);
}
    
</style>