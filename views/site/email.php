<?php

/**
 * @var yii\web\View $this
 * @var string $portalLink
 * @var string $merchantReferenceNumber
 */

use yii\helpers\Html;

$total = 0;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EPAYMENT MRN</title>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>
                    Title
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <p>Hello Customer,</p>
                </td>
            </tr>
            <tr>
                <td></td>
            </tr>
            <tr>
                <td></td>
            </tr>
            <tr>
                <td>
                    <p>
                        <b>Thank you for availing our ITDI service(s).</b><br>
                    </p>

                    <table>
                        <thead>
                            <tr>
                                <th>Request Transaction Number</th>
                                <th>Fee</th>
                        </thead>
                        <tbody>


                            <tr>
                                <th>TOTAL:</th>
                                <td><?= $total ?></td>
                            </tr>
                        </tbody>
                    </table>

                    <br>

                    <p>Your merchant reference number is <b>'</b>,<br>
                        To process your payment,<br>
                        Kindly copy the reference number and paste it in the field provided through this link</a>.

                        <br><br>
                        The Contents of this email message are intended solely for the addressee(s) and may contain confidential
                        and/or privileged information and may be legally protected from disclosure. If you are not the intended
                        recipient of this message or their agent, or if this message has been addressed to you in error, please
                        immediately delete this message. If you are not the intended recipient, you are hereby
                        notified that any use, dissemination, copying, or storage of this message or its attachments is
                        strictly prohibited
                        <br><br>
                        This is an automatically generated email from our system. Please do not reply to this email.
                    </p>
                </td>
            </tr>
        </tbody>
    </table>

</body>

</html>