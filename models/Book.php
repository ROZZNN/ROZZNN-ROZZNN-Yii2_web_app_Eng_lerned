<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "book".
 *
 * @property int $id
 * @property string $title
 * @property string $author
 * @property string $visible
 *
 * @property Bookuser[] $bookusers
 */
class Book extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'book';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'author', 'visible'], 'required'],
            [['title', 'author', 'visible'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'author' => 'Author',
            'visible' => 'Visible',
        ];
    }

    /**
     * Gets query for [[Bookusers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBookusers()
    {
        return $this->hasMany(Bookuser::class, ['id_book' => 'id']);
    }
}
