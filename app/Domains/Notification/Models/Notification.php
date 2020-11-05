<?php

namespace App\Domains\Notification\Models;

use App\Models\Traits\CrudTraits;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Notification extends Model
{
    use CrudTraits;

    protected $fillable = [
        'title',
        'body',
        'incident_id',
        'police_information_id',
        'admin_read',
        'user_read',
        'user_id',
        'already_notif',
    ];

    public const Already_read = 1;
    public const Not_ready_read = 2;

    public const with = [
        'userData',
        'userData.roles',
        'incidentData',
        'incidentData.getReporter.userData.roles',
        'policeInformationData',
    ];

    /**
     * @param $read
     * @return mixed
     */
    public static function getStatusRead($read)
    {
        $data = [
            self::Already_read   => 'Already Read',
            self::Not_ready_read => 'Not Read',
        ];

        return $data[$read];
    }

    /**
     * @return mixed
     */
    public static function getAllUnreadData()
    {
        $where = [
            'already_notif' => self::Not_ready_read,
        ];

        return self::findAllData($where, self::with);
    }

    /**
     * @return mixed
     */
    public static function getAllNotification()
    {
        $orderBy = [
            [
                'key'   => 'id',
                'value' => 'desc',
            ],
        ];

        $whereIn = [
            [
                'key'   => 'id',
                'value' => function ($query) {
                    $query->from('notifications')
                        ->groupBy('incident_id')
                        ->selectRaw('MAX(id)');
                },
            ],
        ];

        $whereNotIn = [
            [
                'key' =>'user_id',
                'value' => User::findAllUserWithRoleBuser()
            ]
        ];


        return self::findPaginateData([], self::with, [], $orderBy, [], $whereIn, [], 2 , [],[],$whereNotIn);
    }

    public static function getNotificationByUser()
    {
        $orderBy = [
            [
                'key'   => 'id',
                'value' => 'desc',
            ],
        ];

        $where = ['user_id' => me()->id];

        return self::findPaginateData($where, self::with, [], $orderBy, null, []);
    }

    /**
     * @return mixed
     */
    public static function countNotificationUnreadByUser()
    {
        $where = [
            'user_id'   => me()->id,
            'user_read' => self::Not_ready_read,
        ];

        return count(self::findAllData($where));
    }

    /**
     * @param $title
     * @param $body
     * @param null $incident_id
     * @param null $police_information_id
     * @param null $user_id
     * @return mixed
     */
    public static function storeDataNotification(
        $title, $body, $incident_id = null, $police_information_id = null, $user_id = null, $already_notif = null
    ) {
        $params = [
            'title'                 => $title ?? '',
            'body'                  => $body ?? '',
            'incident_id'           => $incident_id,
            'police_information_id' => $police_information_id,
            'admin_read'            => self::Not_ready_read,
            'user_read'             => self::Not_ready_read,
            'user_id'               => $user_id,
            'already_notif'         => $already_notif ?? self::Not_ready_read,
        ];

        return self::storeData($params);
    }

    /**
     * @param $title
     * @param $body
     * @param null $incident_id
     * @param null $police_information_id
     * @param null $user_id
     * @param null $already_notif
     */
    public static function storeDataNotificationforBuzer(
        $title, $body, $incident_id = null, $police_information_id = null, $user_id = null, $already_notif = null
    ) {
        $buser = User::findAllUserWithRoleBuser();

        foreach ($buser as $busers) {
            $params = [
                'title'                 => $title ?? '',
                'body'                  => $body ?? '',
                'incident_id'           => $incident_id,
                'police_information_id' => $police_information_id,
                'admin_read'            => self::Already_read,
                'user_read'             => self::Not_ready_read,
                'user_id'               => $busers,
                'already_notif'         => $already_notif ?? self::Not_ready_read,
            ];

            self::storeData($params);
        }
        return;
    }

    /**
     * @return mixed
     */
    public static function updateAllAdminReadDataToRead()
    {
        $where = ['admin_read' => self::Not_ready_read];
        $params = ['admin_read' => self::Already_read];

        return self::updateData($where, $params);
    }

    /**
     * @return mixed
     */
    public static function updateUserReadToReadByID($id)
    {
        $where = [
            'user_id' => me()->id,
            'id'      => $id,
        ];

        $params = ['user_read' => self::Already_read];

        return self::updateData($where, $params);
    }

    /**
     * @return BelongsTo
     */
    public function userData()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * @return BelongsTo
     */
    public function incidentData()
    {
        return $this->belongsTo(Incident::class, 'incident_id');
    }

    /**
     * @return BelongsTo
     */
    public function policeInformationData()
    {
        return $this->belongsTo(PoliceInformation::class, 'police_information_id');
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'id'                 => $this->id,
            'title'              => $this->title,
            'body'               => $this->body,
            'time'               => $this->created_at,
            'name'               => $this->policeInformationData->policeData->userData->name ??
                                    $this->userData->name ?? '',
            'role'               => $this->userData->roles['0']->name ?? '',
            'incident'           => $this->incidentData ?? '',
            'police_information' => $this->policeInformationData ?? '',
            'admin_read'         => $this->admin_read,
            'user_read'          => $this->user_read,
        ];
    }
}
