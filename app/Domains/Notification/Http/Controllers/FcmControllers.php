<?php

namespace App\Domains\Notification\Http\Controllers;

use App\Domains\Auth\Models\User;
use App\Domains\Notification\Http\Requests\FcmRequest;
use App\Http\Controllers\Api\BaseController;
use Exception;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Response;
use LaravelFCM\Facades\FCM;
use LaravelFCM\Message\Exceptions\InvalidOptionsException;
use LaravelFCM\Message\Options;
use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadData;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotification;
use LaravelFCM\Message\PayloadNotificationBuilder;
use LaravelFCM\Sender\DownstreamResponse;

class FcmController extends BaseController
{
    /**
     * @param $request
     * @param $token
     * @return DownstreamResponse
     * @throws InvalidOptionsException
     */
    private function sendMessage($request, $token)
    {
        extract($request->all(), EXTR_OVERWRITE);

        $option       = $this->setOptionBuilder();
        $notification = $this->setNotificationBuilder($title, $body);
        $data         = $this->setPayloadBuilder($data);

        return FCM::sendTo($token, $option, $notification, $data);
    }

    /**
     * @return Options
     * @throws InvalidOptionsException
     */
    private function setOptionBuilder()
    : Options
    {
        $optionBuiler = new OptionsBuilder();
        $optionBuiler->setTimeToLive(60 * 20);

        return $optionBuiler->build();
    }

    /**
     * @param $title
     * @param $body
     * @return PayloadNotification
     */
    private function setNotificationBuilder($title, $body)
    : PayloadNotification
    {
        $notificationBuilder = new PayloadNotificationBuilder($title);
        $notificationBuilder->setBody($body)
            ->setSound('default');

        return $notificationBuilder->build();
    }

    /**
     * @param $data
     * @return PayloadData
     */
    private function setPayloadBuilder($data)
    : PayloadData
    {
        $dataBuilder = new PayloadDataBuilder();
        $dataBuilder->addData($data);

        return $dataBuilder->build();
    }

    /**
     * @param  FcmRequest  $request
     * @return ResponseFactory|Response
     */
    public function sendToUserEmail(FcmRequest $request)
    {
        $token = User::findFCMByEmail($request->email);

        return $this->filterSendMessage($token, $request);
    }

    /**
     * @param  FcmRequest  $request
     * @return Exception|ResponseFactory|Response|InvalidOptionsException
     */
    public function sendToAllUser(FcmRequest $request)
    {
        $token = User::getFCMFromAllData();
        $user  = User::findAllData();

        $len = count($user);
        foreach ($user as $key => $users) {
            if ($key == $len - 1) {
                Notification::storeDataNotification($request->title, $request->body, null, $request->id, $users->id,
                    Notification::Not_ready_read
                );
            }
            else {
                Notification::storeDataNotification($request->title, $request->body, null, $request->id, $users->id,
                    Notification::Already_read
                );
            }
        }

        return $this->filterSendMessage($token, $request);
    }

    /**
     * @param  FcmRequest  $request
     * @return Exception|ResponseFactory|Response|InvalidOptionsException
     */
    public function sendToBuzzer(FcmRequest $request)
    {
        $token = User::getFCMBuzzerRole();

        return $this->filterSendMessage($token, $request);
    }
    /**
     * @param  FcmRequest  $request
     * @return Exception|ResponseFactory|Response|InvalidOptionsException
     */
    public function sendToUserAdmin(FcmRequest $request)
    {
        $token = User::getFCMAdminRole();

        return $this->filterSendMessage($token, $request);
    }

    /**
     * @param  array  $token
     * @param $request
     * @return ResponseFactory|Response
     */
    private function filterSendMessage(array $token, $request)
    {
        if (count($token) > 0) {
            try {
                $this->sendMessage($request, $token);
            }
            catch (InvalidOptionsException $e) {
                return $this->returnFalse('failed',$e);
            }
        } else {
            return $this->returnFalse('FCM not found');
        }

        return $this->returnSuccess('success');
    }
}
