<?php

namespace app\controllers;
use Yii;
use app\models\Rpost;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\web\Response;
use yii\imagine\Image;
use app\models\Rnotificacion;
use app\models\RActividad;
use app\models\Colaborador;
use app\models\RComentarios;
use app\models\Rcomentariocontenidos;
use app\models\Rcontenido;
use app\models\PostSearch;

class RpostController extends \yii\web\Controller {

 /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionIndex() {
    	$searchModel = new PostSearch();
    	$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
        			'searchModel' => $searchModel, 'dataProvider' => $dataProvider,
        		]);
    }

    public function actionCrean($rutColaborador, $rutColaborador2, $id){
	//var_dump($rutColaborador).die();

    	if($id==1){
    		$model = new Rnotificacion();
    		$model->rrutNotificado = $rutColaborador;
    		$model->rcontenido = $rutColaborador2."Ha comentado su post";
    		$model->rleido = 1;
    		$model->rurl = 1;
    		$model->save(false);
    	}
    	if($id==2){
    		$model = new Rnotificacion();
    		$model->rrutNotificado = $rutColaborador;
    		$model->rleido = 1;
    		$model->rurl = 1;
    		$model->rcontenido = $rutColaborador2."Le ha dado me gusta a su imagen";
    		$model->save(false);
    	}
    	if($id==3){
    		$modelo = BuscarController::encuentraColaboradores();
    		$posteador = BuscarController::encuentraColaborador($rutColaborador2);
    		foreach ($modelo as $m) {
    			$model = new Rnotificacion();
    			$model->rrutNotificado = $m["rutColaborador"];
    			$model->rcontenido = $rutColaborador2."ha subido un nuevo post";
    			$model->rleido = 1;
    			$model->rurl = 1;
    			$model->save(false);

    			$model->rcontenido = $modelo->nombreColaborador-"Ha subido un nuevo post. De seguro te interesaria verlo!! Ingresa a la red social http://angloamerican.induccion.org";

    			Yii::$app->mailer->compose()->setFrom('contacto@induccion-org')->setTo($m["correo"])->setSubject('De: Notificaciones Red Social ')->setHtmlBody('<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
    <head>
        <!-- NAME: 1 COLUMN -->
        <!--[if gte mso 15]>
        <xml>
            <o:OfficeDocumentSettings>
            <o:AllowPNG/>
            <o:PixelsPerInch>96</o:PixelsPerInch>
            </o:OfficeDocumentSettings>
        </xml>
        <![endif]-->
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>*|MC:SUBJECT|*</title>
        
    <style type="text/css">
        p{
            margin:10px 0;
            padding:0;
        }
        table{
            border-collapse:collapse;
        }
        h1,h2,h3,h4,h5,h6{
            display:block;
            margin:0;
            padding:0;
        }
        img,a img{
            border:0;
            height:auto;
            outline:none;
            text-decoration:none;
        }
        body,#bodyTable,#bodyCell{
            height:100%;
            margin:0;
            padding:0;
            width:100%;
        }
        .mcnPreviewText{
            display:none !important;
        }
        #outlook a{
            padding:0;
        }
        img{
            -ms-interpolation-mode:bicubic;
        }
        table{
            mso-table-lspace:0pt;
            mso-table-rspace:0pt;
        }
        .ReadMsgBody{
            width:100%;
        }
        .ExternalClass{
            width:100%;
        }
        p,a,li,td,blockquote{
            mso-line-height-rule:exactly;
        }
        a[href^=tel],a[href^=sms]{
            color:inherit;
            cursor:default;
            text-decoration:none;
        }
        p,a,li,td,body,table,blockquote{
            -ms-text-size-adjust:100%;
            -webkit-text-size-adjust:100%;
        }
        .ExternalClass,.ExternalClass p,.ExternalClass td,.ExternalClass div,.ExternalClass span,.ExternalClass font{
            line-height:100%;
        }
        a[x-apple-data-detectors]{
            color:inherit !important;
            text-decoration:none !important;
            font-size:inherit !important;
            font-family:inherit !important;
            font-weight:inherit !important;
            line-height:inherit !important;
        }
        #bodyCell{
            padding:10px;
        }
        .templateContainer{
            max-width:600px !important;
        }
        a.mcnButton{
            display:block;
        }
        .mcnImage{
            vertical-align:bottom;
        }
        .mcnTextContent{
            word-break:break-word;
        }
        .mcnTextContent img{
            height:auto !important;
        }
        .mcnDividerBlock{
            table-layout:fixed !important;
        }
        body,#bodyTable{
            background-color:#f3f3f3;
        }
        #bodyCell{
            border-top:0;
        }
        .templateContainer{
            border:0;
        }
        h1{
            color:#1d3176;
            font-family:Helvetica;
            font-size:16px;
            font-style:normal;
            font-weight:bold;
            line-height:125%;
            letter-spacing:normal;
            text-align:left;
        }
        h2{
            color:#0078b3;
            font-family:Helvetica;
            font-size:24px;
            font-style:normal;
            font-weight:bold;
            line-height:125%;
            letter-spacing:normal;
            text-align:left;
        }
        h3{
            color:#202020;
            font-family:Helvetica;
            font-size:20px;
            font-style:normal;
            font-weight:bold;
            line-height:125%;
            letter-spacing:normal;
            text-align:left;
        }
        h4{
            color:#202020;
            font-family:Helvetica;
            font-size:18px;
            font-style:normal;
            font-weight:bold;
            line-height:125%;
            letter-spacing:normal;
            text-align:left;
        }
        #templatePreheader{
            background-color:#transparent;
            background-image:none;
            background-repeat:no-repeat;
            background-position:center;
            background-size:cover;
            border-top:0;
            border-bottom:0;
            padding-top:9px;
            padding-bottom:9px;
        }
        #templatePreheader .mcnTextContent,#templatePreheader .mcnTextContent p{
            color:#656565;
            font-family:Helvetica;
            font-size:12px;
            line-height:150%;
            text-align:left;
        }
        #templatePreheader .mcnTextContent a,#templatePreheader .mcnTextContent p a{
            color:#656565;
            font-weight:normal;
            text-decoration:underline;
        }
        #templateHeader{
            background-color:#ffffff;
            background-image:none;
            background-repeat:no-repeat;
            background-position:center;
            background-size:cover;
            border-top:4px solid #1d3176;
            border-bottom:0;
            padding-top:0px;
            padding-bottom:0;
        }
        #templateHeader .mcnTextContent,#templateHeader .mcnTextContent p{
            color:#202020;
            font-family:Helvetica;
            font-size:16px;
            line-height:150%;
            text-align:left;
        }
        #templateHeader .mcnTextContent a,#templateHeader .mcnTextContent p a{
            color:#d70929;
            font-weight:normal;
            text-decoration:underline;
        }
        #templateBody{
            background-color:#ffffff;
            background-image:none;
            background-repeat:no-repeat;
            background-position:center;
            background-size:cover;
            border-top:0;
            border-bottom:4px solid #1d3176;
            padding-top:0;
            padding-bottom:10px;
        }
        #templateBody .mcnTextContent,#templateBody .mcnTextContent p{
            color:#202020;
            font-family:Helvetica;
            font-size:16px;
            line-height:150%;
            text-align:left;
        }
        #templateBody .mcnTextContent a,#templateBody .mcnTextContent p a{
            color:#d70929;
            font-weight:normal;
            text-decoration:underline;
        }
        #templateFooter{
            background-color:#transparent;
            background-image:none;
            background-repeat:no-repeat;
            background-position:center;
            background-size:cover;
            border-top:0;
            border-bottom:0;
            padding-top:15px;
            padding-bottom:10px;
        }
        #templateFooter .mcnTextContent,#templateFooter .mcnTextContent p{
            color:#656565;
            font-family:Helvetica;
            font-size:12px;
            line-height:150%;
            text-align:center;
        }
        #templateFooter .mcnTextContent a,#templateFooter .mcnTextContent p a{
            color:#656565;
            font-weight:normal;
            text-decoration:underline;
        }
    @media only screen and (min-width:768px){
        .templateContainer{
            width:600px !important;
        }

}   @media only screen and (max-width: 480px){
        body,table,td,p,a,li,blockquote{
            -webkit-text-size-adjust:none !important;
        }

}   @media only screen and (max-width: 480px){
        body{
            width:100% !important;
            min-width:100% !important;
        }

}   @media only screen and (max-width: 480px){
        #bodyCell{
            padding-top:10px !important;
        }

}   @media only screen and (max-width: 480px){
        .mcnImage{
            width:100% !important;
        }

}   @media only screen and (max-width: 480px){
        .mcnCartContainer,.mcnCaptionTopContent,.mcnRecContentContainer,.mcnCaptionBottomContent,.mcnTextContentContainer,.mcnBoxedTextContentContainer,.mcnImageGroupContentContainer,.mcnCaptionLeftTextContentContainer,.mcnCaptionRightTextContentContainer,.mcnCaptionLeftImageContentContainer,.mcnCaptionRightImageContentContainer,.mcnImageCardLeftTextContentContainer,.mcnImageCardRightTextContentContainer{
            max-width:100% !important;
            width:100% !important;
        }

}   @media only screen and (max-width: 480px){
        .mcnBoxedTextContentContainer{
            min-width:100% !important;
        }

}   @media only screen and (max-width: 480px){
        .mcnImageGroupContent{
            padding:9px !important;
        }

}   @media only screen and (max-width: 480px){
        .mcnCaptionLeftContentOuter .mcnTextContent,.mcnCaptionRightContentOuter .mcnTextContent{
            padding-top:9px !important;
        }

}   @media only screen and (max-width: 480px){
        .mcnImageCardTopImageContent,.mcnCaptionBlockInner .mcnCaptionTopContent:last-child .mcnTextContent{
            padding-top:18px !important;
        }

}   @media only screen and (max-width: 480px){
        .mcnImageCardBottomImageContent{
            padding-bottom:9px !important;
        }

}   @media only screen and (max-width: 480px){
        .mcnImageGroupBlockInner{
            padding-top:0 !important;
            padding-bottom:0 !important;
        }

}   @media only screen and (max-width: 480px){
        .mcnImageGroupBlockOuter{
            padding-top:9px !important;
            padding-bottom:9px !important;
        }

}   @media only screen and (max-width: 480px){
        .mcnTextContent,.mcnBoxedTextContentColumn{
            padding-right:18px !important;
            padding-left:18px !important;
        }

}   @media only screen and (max-width: 480px){
        .mcnImageCardLeftImageContent,.mcnImageCardRightImageContent{
            padding-right:18px !important;
            padding-bottom:0 !important;
            padding-left:18px !important;
        }

}   @media only screen and (max-width: 480px){
        .mcpreview-image-uploader{
            display:none !important;
            width:100% !important;
        }

}   @media only screen and (max-width: 480px){
        h1{
            font-size:22px !important;
            line-height:125% !important;
        }

}   @media only screen and (max-width: 480px){
        h2{
            font-size:20px !important;
            line-height:125% !important;
        }

}   @media only screen and (max-width: 480px){
        h3{
            font-size:18px !important;
            line-height:125% !important;
        }

}   @media only screen and (max-width: 480px){
        h4{
            font-size:16px !important;
            line-height:150% !important;
        }

}   @media only screen and (max-width: 480px){
        .mcnBoxedTextContentContainer .mcnTextContent,.mcnBoxedTextContentContainer .mcnTextContent p{
            font-size:14px !important;
            line-height:150% !important;
        }

}   @media only screen and (max-width: 480px){
        #templatePreheader{
            display:block !important;
        }

}   @media only screen and (max-width: 480px){
        #templatePreheader .mcnTextContent,#templatePreheader .mcnTextContent p{
            font-size:14px !important;
            line-height:150% !important;
        }

}   @media only screen and (max-width: 480px){
        #templateHeader .mcnTextContent,#templateHeader .mcnTextContent p{
            font-size:16px !important;
            line-height:150% !important;
        }

}   @media only screen and (max-width: 480px){
        #templateBody .mcnTextContent,#templateBody .mcnTextContent p{
            font-size:16px !important;
            line-height:150% !important;
        }

}   @media only screen and (max-width: 480px){
        #templateFooter .mcnTextContent,#templateFooter .mcnTextContent p{
            font-size:14px !important;
            line-height:150% !important;
        }

}</style></head>
    <body style="height: 100%;margin: 0;padding: 0;width: 100%;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;background-color: #f3f3f3;">
    
        <center>
            <table align="center" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="bodyTable" style="border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;height: 100%;margin: 0;padding: 0;width: 100%;background-color: #f3f3f3;">
                <tr>
                    <td align="center" valign="top" id="bodyCell" style="mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;height: 100%;margin: 0;padding: 10px;width: 100%;border-top: 0;">
                        <!-- BEGIN TEMPLATE // -->
                        <!--[if gte mso 9]>
                        <table align="center" border="0" cellspacing="0" cellpadding="0" width="600" style="width:600px;">
                        <tr>
                        <td align="center" valign="top" width="600" style="width:600px;">
                        <![endif]-->
                        <table border="0" cellpadding="0" cellspacing="0" width="100%" class="templateContainer" style="border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;border: 0;max-width: 600px !important;">
                            <tr>
                                <td valign="top" id="templatePreheader" style="background:#transparent none no-repeat center/cover;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;background-color: #transparent;background-image: none;background-repeat: no-repeat;background-position: center;background-size: cover;border-top: 0;border-bottom: 0;padding-top: 9px;padding-bottom: 9px;"></td>
                            </tr>
                            <tr>
                                <td valign="top" id="templateHeader" style="background:#ffffff none no-repeat center/cover;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;background-color: #ffffff;background-image: none;background-repeat: no-repeat;background-position: center;background-size: cover;border-top: 4px solid #1d3176;border-bottom: 0;padding-top: 0px;padding-bottom: 0;"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnImageBlock" style="min-width: 100%;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
    <tbody class="mcnImageBlockOuter">
            <tr>
                <td valign="top" style="padding: 0px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;" class="mcnImageBlockInner">
                    <table align="left" width="100%" border="0" cellpadding="0" cellspacing="0" class="mcnImageContentContainer" style="min-width: 100%;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
                        <tbody><tr>
                            <td class="mcnImageContent" valign="top" style="padding-right: 0px;padding-left: 0px;padding-top: 0;padding-bottom: 0;text-align: center;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
                                
                                    
                                        <img align="center" alt="" src="https://gallery.mailchimp.com/03febbdabf96b1c2d187088ce/images/b3b0d583-b8c6-42ea-888c-b48b01bc6199.jpg" width="599.9999694824219" style="max-width: 600px;padding-bottom: 0;display: inline !important;vertical-align: bottom;border: 0;height: auto;outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;" class="mcnImage">
                                    
                                
                            </td>
                        </tr>
                    </tbody></table>
                </td>
            </tr>
    </tbody>
</table></td>
                            </tr>
                            <tr>
                                <td valign="top" id="templateBody" style="background:#ffffff none no-repeat center/cover;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;background-color: #ffffff;background-image: none;background-repeat: no-repeat;background-position: center;background-size: cover;border-top: 0;border-bottom: 4px solid #1d3176;padding-top: 0;padding-bottom: 10px;"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width: 100%;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
    <tbody class="mcnTextBlockOuter">
        <tr>
            <td valign="top" class="mcnTextBlockInner" style="padding-top: 9px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
                <!--[if mso]>
                <table align="left" border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100%;">
                <tr>
                <![endif]-->
                
                <!--[if mso]>
                <td valign="top" width="599" style="width:599px;">
                <![endif]-->
                <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width: 100%;min-width: 100%;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;" width="100%" class="mcnTextContentContainer">
                    <tbody><tr>
                        
                        <td valign="top" class="mcnTextContent" style="padding-top: 0;padding-right: 18px;padding-bottom: 9px;padding-left: 18px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;word-break: break-word;color: #202020;font-family: Helvetica;font-size: 16px;line-height: 150%;text-align: left;">
                        
                            <div style="text-align: center;"><span style="font-size:13px">Estimado <strong>'.$m["nombreColaborador"]." ".$m["apellidosColaborador"].'</strong>,<br>
Hay una nueva publicación en la <strong>Red Social de Inducción</strong> que te puede ser de tu interés.<br>
<br>
<strong>'.$posteador->nombreColaborador.' '.$posteador->apellidosColaborador.'</strong> ha realizado una nueva publicación.</span></div>

                        </td>
                    </tr>
                </tbody></table>
                <!--[if mso]>
                </td>
                <![endif]-->
                
                <!--[if mso]>
                </tr>
                </table>
                <![endif]-->
            </td>
        </tr>
    </tbody>
</table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnDividerBlock" style="min-width: 100%;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;table-layout: fixed !important;">
    <tbody class="mcnDividerBlockOuter">
        <tr>
            <td class="mcnDividerBlockInner" style="min-width: 100%;padding: 10px 18px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
                <table class="mcnDividerContent" border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width: 100%;border-top: 2px solid #F3F3F3;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
                    <tbody><tr>
                        <td style="mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
                            <span></span>
                        </td>
                    </tr>
                </tbody></table>
<!--            
                <td class="mcnDividerBlockInner" style="padding: 18px;">
                <hr class="mcnDividerContent" style="border-bottom-color:none; border-left-color:none; border-right-color:none; border-bottom-width:0; border-left-width:0; border-right-width:0; margin-top:0; margin-right:0; margin-bottom:0; margin-left:0;" />
-->
            </td>
        </tr>
    </tbody>
</table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width: 100%;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
    <tbody class="mcnTextBlockOuter">
        <tr>
            <td valign="top" class="mcnTextBlockInner" style="padding-top: 9px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
                <!--[if mso]>
                <table align="left" border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100%;">
                <tr>
                <![endif]-->
                
                <!--[if mso]>
                <td valign="top" width="599" style="width:599px;">
                <![endif]-->
                <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width: 100%;min-width: 100%;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;" width="100%" class="mcnTextContentContainer">
                    <tbody><tr>
                        
                        <td valign="top" class="mcnTextContent" style="padding-top: 0;padding-right: 18px;padding-bottom: 9px;padding-left: 18px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;word-break: break-word;color: #202020;font-family: Helvetica;font-size: 16px;line-height: 150%;text-align: left;">
                        
                            <div style="text-align: center;"><span style="font-size:14px"><strong>INGRESA CON TU EMAIL PERSONAL</strong></span></div>

                        </td>
                    </tr>
                </tbody></table>
                <!--[if mso]>
                </td>
                <![endif]-->
                
                <!--[if mso]>
                </tr>
                </table>
                <![endif]-->
            </td>
        </tr>
    </tbody>
</table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnButtonBlock" style="min-width: 100%;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
    <tbody class="mcnButtonBlockOuter">
        <tr>
            <td style="padding-top: 0;padding-right: 18px;padding-bottom: 18px;padding-left: 18px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;" valign="top" align="center" class="mcnButtonBlockInner">
                <table border="0" cellpadding="0" cellspacing="0" class="mcnButtonContentContainer" style="border-collapse: separate !important;border-radius: 3px;background-color: #1D3176;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
                    <tbody>
                        <tr>
                            <td align="center" valign="middle" class="mcnButtonContent" style="font-family: Arial;font-size: 14px;padding: 15px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
                                <a class="mcnButton " title="IR A LA RED SOCIAL DE INDUCCIÓN ANGLO AMERICAN" href="http://angloamerican.induccion.org" target="_blank" style="font-weight: bold;letter-spacing: normal;line-height: 100%;text-align: center;text-decoration: none;color: #FFFFFF;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;display: block;">IR A LA RED SOCIAL DE INDUCCIÓN ANGLO AMERICAN</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnDividerBlock" style="min-width: 100%;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;table-layout: fixed !important;">
    <tbody class="mcnDividerBlockOuter">
        <tr>
            <td class="mcnDividerBlockInner" style="min-width: 100%;padding: 10px 18px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
                <table class="mcnDividerContent" border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width: 100%;border-top: 2px solid #F3F3F3;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
                    <tbody><tr>
                        <td style="mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
                            <span></span>
                        </td>
                    </tr>
                </tbody></table>
<!--            
                <td class="mcnDividerBlockInner" style="padding: 18px;">
                <hr class="mcnDividerContent" style="border-bottom-color:none; border-left-color:none; border-right-color:none; border-bottom-width:0; border-left-width:0; border-right-width:0; margin-top:0; margin-right:0; margin-bottom:0; margin-left:0;" />
-->
            </td>
        </tr>
    </tbody>
</table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width: 100%;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
    <tbody class="mcnTextBlockOuter">
        <tr>
            <td valign="top" class="mcnTextBlockInner" style="padding-top: 9px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
                <!--[if mso]>
                <table align="left" border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100%;">
                <tr>
                <![endif]-->
                
                <!--[if mso]>
                <td valign="top" width="599" style="width:599px;">
                <![endif]-->
                <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width: 100%;min-width: 100%;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;" width="100%" class="mcnTextContentContainer">
                    <tbody><tr>
                        
                        <td valign="top" class="mcnTextContent" style="padding-top: 0;padding-right: 18px;padding-bottom: 9px;padding-left: 18px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;word-break: break-word;color: #202020;font-family: Helvetica;font-size: 16px;line-height: 150%;text-align: left;">
                        
                            <div style="text-align: center;"><span style="font-size:13px">Ante cualquier duda envíanos un correo a <a href="mailto:" target="_blank" style="mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;color: #d70929;font-weight: normal;text-decoration: underline;">induccion@angloamerican.com</a></span><br>
<br>
<br>
<span style="font-size:12px"><strong>GERENCIA DE RECURSOS HUMANOS</strong><br>
<strong><span style="color:#1d3176">ANGLO AMERICAN</span></strong></span><br>
 </div>

                        </td>
                    </tr>
                </tbody></table>
                <!--[if mso]>
                </td>
                <![endif]-->
                
                <!--[if mso]>
                </tr>
                </table>
                <![endif]-->
            </td>
        </tr>
    </tbody>
</table></td>
                            </tr>
                            <tr>
                                <td valign="top" id="templateFooter" style="background:#transparent none no-repeat center/cover;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;background-color: #transparent;background-image: none;background-repeat: no-repeat;background-position: center;background-size: cover;border-top: 0;border-bottom: 0;padding-top: 15px;padding-bottom: 10px;"></td>
                            </tr>
                        </table>
                        <!--[if gte mso 9]>
                        </td>
                        </tr>
                        </table>
                        <![endif]-->
                        <!-- // END TEMPLATE -->
                    </td>
                </tr>
            </table>
        </center>
                <center>
                <br />
                <br />
                <br />
                <br />
                <br />
                <br />
     
                <style type="text/css">
                    @media only screen and (max-width: 480px){
                        table#canspamBar td{font-size:14px !important;}
                        table#canspamBar td a{display:block !important; margin-top:10px !important;}
                    }
                </style>
            </center></body>
</html>
')
            ->send();


    		}
    	}
    	
    }

    public function actionRotate($idPost){
    	$model = BuscarController::findPost($idPost);
    	if ($model->rrotador == 270){
    		$model->rrotador = 0;
    	} else {
    		$model->rrotador = $model->rrotador + 90;
    	}
    	$model->save(false);
    	$valor = $model->rrotador;
    	return $valor;
    }

    public function actionEliminar($idPost){
    	$model = BuscarController::findPost($idPost)->delete();

    	var_dump($model).die();
    	return true;
    }

    public function actionView($idPost, $idAmigos){
    	return $this->render('view', [
    			'model' => BuscarController::findPostAmigos($idPost,$idAmigos),
    	]);
    }

    public function actionCreatestado(){
    	ini_set('post_max_size', '64M');
        ini_set('upload_max_filesize', '64M');
        ini_set('memory_limit', '256M');

        $model = new Rpost();
        $model->rut1 = Yii::$app->request->post()["rut1"];
    	$model->rut2 = Yii::$app->request->post()["rut2"];
    	$model->rdescripcionPost = Yii::$app->request->post()["rdescripcionPost"];
    	$model->rtipoPost = 1;
    	date_default_timezone_set(
    		"America/Santiago");
    	$model->rfecha = date("Y-m-d G:i:s");
    	$model->save(false);

    			$actividad = new RActividad();

    			$actividad->rutColaborador1 = $model->rut1;
    			$actividad->rutColaborador2 = $model->rut2;
    			$actividad->ridpost = $model->ridPost;
    			$actividad->ridtipo_post = $model->rtipoPost;

    			$actividad->save(false);

    			$lugar = Yii::$app->request->post()["lugar"];

    			if($lugar==1){

    				$session = Yii::$app->session;
    				$rutColaborador = $session['rut'];

    				$model = BuscarController::encuentraColaborador($rutColaborador);
    				$model2 = BuscarController::encuentraAmigos($rutColaborador);
                    $perfil = BuscarController::findPerfil($model->idperfilRed);
    				$model3 = new Rpost();

    				$session['foto'] = $perfil->rfoto;
    				$session['apellidosColaborador'] = $model->apellidosColaborador;

    				return $this->redirect(['colaborador/perfil',
    							'model' => $model,
    							'model2' => $model2,
                                'perfil' => $perfil,
    							'model3' => $model3]);


    			}else {

    			}
    }

    	public function actionVideo(){
    	ini_set('post_max_size', '64M');
        ini_set('upload_max_filesize', '64M');
        ini_set('memory_limit', '256M');
        
        $model = new Rpost();
        $model->rut1 = Yii::$app->request->post()["rutColaborador1"];
        $model->rut2 = Yii::$app->request->post()["rutColaborador2"];	
        $model->rdescripcionPost = Yii::$app->request->post()["rdescripcionPost"];
        $model->grupo = 1;
        $model->file = UploadedFile::getInstances($model, 'rfoto');

        foreach ($model->file as $file) {
        	
        	$ruta= 'img/post/video/' . $model->rutl . $file->baseName - $num . "." . $file->extension;
        	$file->saveAs('img/post/video/' . $model->rut1 . $file->baseName . $num . "." . $file->extension);
            $model->rfoto = $model->rut1 . $file->baseName . $num . "." . $file->extension;
        }

        $model->rtipoPost = 3;
        $model->rfecha = date("Y-m-d G:i:s");

        $model->save(false);
        		$actividad = new RActividad();
        		$actividad->rutColaborador1 = $model->rut1;
        		$actividad->rutColaborador2 = $model->rut2;
        		$actividad->ridpost = $model->ridPost;
        		$actividad->ridtipo_post = $model->rtipoPost;

        		$actividad->save(false);

        		$lugar = Yii::$app->request->post()["lugar"];

        		if($lugar==1){

        			$session = Yii::$app->session;
        			$rutColaborador = $session['rut'];

        			$model = BuscarController::encuentraColaborador($rutColaborador);
        			$model2 = BuscarController::encuentraAmigos($rutColaborador);
                    $perfil = BuscarController::findPerfil($model->idperfilRed);
        			$model3 = new Rpost();

        			$session['foto'] = $perfil->rfoto;
        			$session['apellidosColaborador'] = $model->apellidosColaborador;

        			return $this->redirect(['colaborador/perfil',
        				'model' => $model,
                        'perfil' => $perfil,
        				'model2' => $model2,
        				'model3' => $model3
        		]);
        		}else {

        		}
    	}

    	public function actionCreate(){
			ini_set('post_max_size', '64M');
        	ini_set('upload_max_filesize', '64M');
        	ini_set('memory_limit', '256M');
        	ini_set('memory_limit', '8192M'); 
        	date_default_timezone_set("America/Santiago");

        	$model = new Rpost();
        	if (Yii::$app->request->post()){
        		if(!preg_match("/^\S*$/", Yii::$app->request->post()["rdescripcionPost"]))
   					{
        				\Yii::$app->getSession()->setFlash('error', ' <div class="col-sm-12 col-md-12">
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                ×</button>
                           <span class="glyphicon glyphicon-no"></span> <strong>Mensaje de error</strong>
                            <hr class="message-inner-separator">
                            <p>
                                Debe ingresar algun contenido a postear.</p>
                        </div>
                    </div>');
                    return $this->redirect('../colaborador/perfil');
                }else{
                	$model->file = UploadedFile::getInstances($model, 'file');

                	if(empty($model->file) && empty(Yii::$app->request->post()["rdescripcionPost"])){


                		\Yii::$app->getSession()->setFlash('error', ' <div class="col-sm-12 col-md-12">
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                ×</button>
                           <span class="glyphicon glyphicon-no"></span> <strong>Mensaje de error</strong>
                            <hr class="message-inner-separator">
                            <p>
                                Debe ingresar algun contenido a postear.</p>
                        </div>
                    </div>');
                    return $this->redirect('../colaborador/perfil');
                }else{

                }
        	}

        	$model->file = UploadedFile::getInstances($model, 'file');
        	$model->file1 = UploadedFile::getInstances($model, 'file1');
        	$model->file2 = UploadedFile::getInstances($model, 'file2');	

        	$model->rut1 = Yii::$app->request->post()["rutColaborador"];
        	if (empty(Yii::$app->request->post()["rdescripcionPost"])) {
        		$model->rdescripcionPost = "0";
        	}else{
        		$model->rdescripcionPost = Yii::$app->request->post()["rdescripcionPost"];
        	}

        	$mystring = Yii::$app->request->post()["rdescripcionPost"];
        	$findme = "youtube";
        	$pos = strpos($mystring, $findme);
        	$num = rad(5, 600);

        	ini_set('memory_limit', '8192M'); 

        	if ($pos == false){
        		$model->rfecha = date("Y-m-d G:i:s");
        	}else {
        		$iframe = $this->convertYoutube($mystring);
        		$model->rdescripcionPost = $iframe;
        			date_default_timezone_set("America/Santiago");
				$model->rfecha = date("Y-m-d G:i:s");
        		$model->rtipoPost = 1;

        	}

        	$mystring2 = Yii::$app->request->post()["rdescripcionPost"];
        	$findme2 = "facebook";
        	$pos2 = strpos($mystring2, $findme2);
        	$num2 = rand(5, 600);

        	ini_set('memory_limit', '8192M'); 

        	if ($pos2 == false) {
                $model->rfecha = date("Y-m-d G:i:s");
            } else {
                
                $model->rdescripcionPost = Yii::$app->request->post()["rdescripcionPost"];
                date_default_timezone_set("America/Santiago");

                $model->rfecha = date("Y-m-d G:i:s");
                $model->rtipoPost = 7;
            }

            if (empty($model->file)) {
                if ($pos == true) {
                    $model->rtipoPost = 5; // este post es sin foto
                } else {
                    $model->rtipoPost = 1; // este post es sin foto
                }
            } else {

            	//var_dump($model->file[0]->type);die();

            	 if ($model->file[0]->type == "image/jpeg" || $model->file[0]->type == "image/png" || $model->file[0]->type == "image/gif") {
                    $model->rtipoPost = 2; // este post es con foto
                    foreach ($model->file as $file) {

                    	$file->saveAs('img/post/' . $model->rut1 . $file->baseName . $num . "." . $file->extension);
                        $ruta = 'img/post/' . $model->rut1 . $file->baseName . $num . "." . $file->extension;
                        Image::thumbnail($ruta, 5000, 5000)
                                ->save('img/post/' . $model->rut1 . $file->baseName . $num . "." . $file->extension, ['quality' => 50]);

                        $model->rfoto = $model->rut1 . $file->baseName . $num . "." . $file->extension;
                    }
                    }
                    if ($model->file[0]->type == "application/msword" || $model->file[0]->type == "application/vnd.openxmlformats-officedocument.wordprocessingml.document") {
                    	$model->rtipoPost = 6; //post con foto
                    	foreach ($model->file as $file) {
                    		$file->saveAs('img/archivos/' . $model->rut1 . $file->$num . "." . $file->extension);
                    		$ruta = 'img/archivos' . $model->rut1 . $file->baseName . $num . "." . $file->extension;
                    		$model->rfoto = "word.png";
                    		$model->rdescripcionPost = $model->rut1 . $file->baseName . $num . "." . $file ->extension;
                    		$model->rnombreArchivo = $file->baseName.".".$file->extension;
                    	}
                    }

                    if ($model->file[0]->type == "application/vnd.openxmlformats-officedocument.presentationml.presentation") {
                    $model->rtipoPost = 6; // este post es con foto
                    foreach ($model->file as $file) {

                    	$file->saveAs('img/archivos' . $file->baseName . $num . "." . $file->extension);
                    	$ruta = 'img/archivos' . $model->rut1 . $file->baseName . $num. "." . $file->extension;
                    	$model->rfoto = "´power.png";
                    	$model->rdescripcionPost = $model->rut1 . $file->baseName . $num . "." . $file->extension;
                    	$model->rnombreArchivo = $file->baseName. ".".$file->extension;
                    }
                }
               if ($model->file[0]->type == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet") {
                    $model->rtipoPost = 6; // este post es con foto
                    foreach ($model->file as $file) {
                        $file->saveAs('img/archivos/' . $model->rut1 . $file->baseName . $num . "." . $file->extension);
                        $ruta = 'img/archivos/' . $model->rut1 . $file->baseName . $num . "." . $file->extension;
                        $model->rfoto = "excel.png";
                        $model->rdescripcionPost = $model->rut1 . $file->baseName . $num . "." . $file->extension;
                        $model->rnombreArchivo = $file->baseName.".".$file->extension;
                    }
                } 
               if ($model->file[0]->type == "application/pdf") {
                    $model->rtipoPost = 6; // este post es con foto
                    foreach ($model->file as $file) {
                        $file->saveAs('img/archivos/' . $model->rut1 . $file->baseName . $num . "." . $file->extension);
                        $ruta = 'img/archivos/' . $model->rut1 . $file->baseName . $num . "." . $file->extension;
                        $model->foto = "pdf.png";
                        $model->rdescripcionPost = $model->rut1 . $file->baseName . $num . "." . $file->extension;
                        $model->rnombreArchivo = $file->baseName.".".$file->extension;
                    }
                }
                if ($model->file[0]->type == "video/quicktime" || $model->file[0]->type == "video/3gpp" || $model->file[0]->type == "video/mp4")  {
                    $model->rtipoPost = 3; // este post es con foto
                    foreach ($model->file as $file) {

                        $ruta = 'img/post/video/' . $model->rut1 . $file->baseName . $num . "." . $file->extension;
                        $file->saveAs('img/post/video/' . $model->rut1 . $file->baseName . $num . "." . $file->extension);
                        $model->rfoto = $model->rut1 . $file->baseName . $num . "." . $file->extension;
                    }
                }
            }

            $model->rut1 = Yii::$app->request->post()["rutColaborador"];
            $model->rut2 = 1;
            $model->grupo = 1;

            if ($model->rfoto == NULL && $model->rdescripcionPost == "0") {
            } else{
            	$model->save(false);
            	$actividad = new RActividad();
            	$actividad->rutColaborador1 = $model->rut1;
            	$actividad->rutColaborador2 = $model->rut2;
            	$actividad->ridpost = $model->ridPost;
            	$actividad->ridtipo_post = $model->rtipoPost;
            	$actividad->save(false);
            }

            $session = Yii::$app->session;
            $rutColaborador = $session['rut'];

            $model = BuscarController::encuentraColaborador($rutColaborador);
            $perfil = BuscarController::findPerfil($model->idperfilRed);
            $model2 = BuscarController::encuentraAmigos($rutColaborador);
            $model3 = new Rpost();

            $session['foto'] = $perfil->rfoto;
            $session['apellidosColaborador'] =$model->apellidosColaborador;

            if($model->ridPost != null){
            	$this->actionCrean($rutColaborador, $rutColaborador, 3);
            }

            return $this->redirect(['colaborador/perfil',
        				'model' =>$model,
                        'perfil' =>$perfil,
        				'model2' =>$model2,
        				'model3' =>$model3]);
        }else{
        	return $this->render('create', ['model' => $model,
        	]);
        }
	}

	public function actionCreates(){
		ini_set('post_max_size', '64M');
        ini_set('upload_max_filesize', '64M');
        ini_set('memory_limit', '256M');

        $model = new Rpost();
        if (Yii::$app->request->post()) {

            $model->file = UploadedFile::getInstances($model, 'rfoto');
            $model->rut1 = Yii::$app->request->post()["rut1"];
            $rut2 = Yii::$app->request->post()["rut2"];
            $model->rut2 = $rut2;
            if (empty(Yii::$app->request->post()["rdescripcionPost"])) {
                $model->rdescripcionPost = "0";
            } else {
                $model->rdescripcionPost = Yii::$app->request->post()["rdescripcionPost"];
            }

            $mystring = Yii::$app->request->post()["rdescripcionPost"];
            $findme = "youtube";
            $pos = strpos($mystring, $findme);
            $num = rand(5, 600);

            if ($pos == false) {
                date_default_timezone_set("America/Santiago");
                $model->rfecha = date("Y-m-d G:i:s");
            } else {
                $iframe = $this->convertYoutube($mystring);
                $model->rdescripcionPost = $iframe;
                date_default_timezone_set("America/Santiago");
                $model->rfecha = date("Y-m-d G:i:s");
                $model->rtipoPost = 1;
            }

            if (empty($model->file)) {
                if ($pos == true) {
                    $model->rtipoPost = 5; // este post es sin foto
                } else {
                    $model->rtipoPost = 1; // este post es sin foto
                }
            } else {
            	if ($model->file[0]->type == "image/jpeg") {
                    $model->rtipoPost = 2; // este post es con foto
                    foreach ($model->file as $file) {

                        $file->saveAs('img/post/' . $model->rut1 . $file->baseName . $num . "." . $file->extension);
                        $ruta = 'img/post/' . $model->rut1 . $file->baseName . $num . "." . $file->extension;
                        Image::thumbnail($ruta, 500, 500)
                                ->save('img/post/' . $model->rut1 . $file->baseName . $num . "." . $file->extension, ['quality' => 50]);

                        $model->rfoto = $model->rut1 . $file->baseName . $num . "." . $file->extension;
                    }
                } else {
                    $model->rtipoPost = 3; // este post es con foto
                    foreach ($model->file as $file) {


                        $ruta = 'img/post/video/' . $model->rut1 . $file->baseName . $num . "." . $file->extension;
                        $file->saveAs('img/post/video/' . $model->rut1 . $file->baseName . $num . "." . $file->extension);
                        $model->rfoto = $model->rut1 . $file->baseName . $num . "." . $file->extension;
                    }

                    if ($model->rfoto == NULL) {
                        
                    }
                }
            }
            $model->idGrupo = 1;
            $model->save(false);
            $actividad = new RActividad();
            $actividad->rutColaborador1 = $model->rut1;
            $actividad->rutColaborador2 = $model->rut2;
            $actividad->ridpost = $model->ridPost;
            $actividad->ridtipo_post = $model->rtipoPost;
            $actividad->save(false);

            $session = Yii::$app->session;
            $rutColaborador = $session['rut'];

            $model = BuscarController::encuentraColaborador($rutColaborador);
            $perfil = BuscarController::findPerfil($model->idperfilRed);
            $model2 = BuscarController::encuentraAmigos($rutColaborador);
            $model3 = new Rpost();

            $session['foto'] = $perfil->rfoto;
            $session['apellidosColaborador'] = $model->apellidosColaborador; 
            return $this->redirect(['colaborador/perfil',
                        'model' => $model,
                        'perfil' => $perfil,
                        'model2' => $model2,
                        'model3' => $model3]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    public function actionComentario($rutPersona, $idPost, $comentario){
    	$model = new Rcomentarios();
        $model->rcontenido = $comentario;
        $model->rut = $rutPersona;
        $model->ridpost = $idPost;
        date_default_timezone_set("America/Santiago");
        $model->fecha = date("Y-m-d G:i:s");
        $model->save(false);

        $post = BuscarController::findPost($idPost);
        $post->rcomentarios = $post->rcomentarios +1;
        $post->save(false);
        

        if($post->rut1 != $rutPersona){
        	$persona2 = BuscarController::encuentraColaboradorRut($post->rut1);
        	$estadistica = BuscarController::findEstadistica($persona2->idestadisticas);
            $estadistica->idestadisticas = $persona2->idestadisticas;
        	$estadistica->rcomentariosr = $estadistica->rcomentariosr + 1;

        	$persona2->save(false);
        	$estadistica->save(false);
        }

        $persona1 = BuscarController::findColaboradorRut($rutPersona);
        $estadistica = BuscarController::findEstadistica($persona1->idestadisticas);
        $perfilPersona = BuscarController::findPerfil($persona1->idperfilRed);
        $estadistica->rcomentarios = $estadistica->rcomentarios + 1;
        $persona1->save(false);
        $estadistica->save(false);

        $objeto = new \yii\helpers\ArrayHelper();
        $objeto->foto = $perfilPersona["rfoto"];
        $objeto->nombre = $persona1["nombreColaborador"];
        $objeto->apellidos = $persona1["apellidosColaborador"];
        $objeto->rotate = $perfilPersona["rrotador"];

       $this->actionCrean($post->rut1,$post->rut2,1);
        return \yii\helpers\Json::encode($objeto);
         

    }

    public function actionComentarioc($rutPersona, $idContenido, $comentario) {

        $model = new Rcomentariocontenidos();
        $model->rcontenido = $comentario;
        $model->rut = $rutPersona;
        $model->ridcontenido = $idContenido;
        $model->save(false);

        $contenido = BuscarController::findContenido($idContenido);
        $persona = BuscarController::findColaboradorRut($rutPersona);
        $perfilPersona = BuscarController::findPerfil($persona->idperfilRed);
        $contenido->rcomentarios = $contenido->rcomentarios + 1;
        $contenido->save(false);
        
        


        $objeto = new \yii\helpers\ArrayHelper();
        $objeto->foto = $perfilPersona[0]["rfoto"];
        $objeto->nombre = $persona[0]["nombreColaborador"];
        $objeto->apellidos = $persona[0]["apellidosColaborador"];
        $objeto->rotate = $perfilPersona[0]["rrotador"];

        return \yii\helpers\Json::encode($objeto);
    }


    public function actionLike($rutPersona, $idPost){

    	$post = BuscarController::findPost($idPost);
    	$post->rlikes = $post->rlikes + 1;
    	$post->save(false);
        
    	if ($post->rut1 != $rutPersona){
    		$persona2 = BuscarController::findColaboradorRut($post->rut1);
    		$estadistica = BuscarController::findEstadistica($persona2->idestadisticas);
    		$estadistica->idestadisticas = $persona2->idestadisticas;
    		$estadistica->rlikesr = $estadistica->rlikesr + 1;
    		$estadistica->save(false);
    		$persona2->save(false);

    	}

        $likePost = BuscarController::findPost($idPost);
        $likePost->ridPost = $idPost;
        $likePost->rlikes = $likePost->rlikes +1;
        $likePost->rut1 = $rutPersona;
        $likePost->save(false);

    	$persona = BuscarController::findColaboradorRut($rutPersona);
    	$estadistica = BuscarController::findEstadistica($persona->idestadisticas);
    	$estadistica->rlikes = $estadistica->rlikes + 1;
    	$persona->save(false);
    	$estadistica->save(false);
    	$this->actionCrean($post->rut1, $post->rut2,1);
    	return $post->rlikes;

    }



    public function convertYoutube($string) {
        return preg_replace(
                "/\s*[a-zA-Z\/\/:\.]*youtu(be.com\/watch\?v=|.be\/)([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i", "<iframe width='560' height='315' src=\"//www.youtube.com/embed/$2\"  allowfullscreen></iframe>", $string
        );
    }

    public function actionUpdate($idPost, $idAmigos) {
        $model = BuscarController::findPostAmigos($idPost, $idAmigos);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'ridPost' => $model->ridPost, 'idAmigos' => $model->ridAmigos]);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    public function actionDelete($idPost, $idAmigos) {
        $model = BuscarController::findPostAmigos($idPost, $idAmigos)->delete();

        return $this->redirect(['index']);
    }

}