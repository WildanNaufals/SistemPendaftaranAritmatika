<?php



namespace app\controllers;

use Yii;
use yii\helpers\ArrayHelper;
use yii\filters\AccessControl;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Controller;
use app\models\User;
use app\models\Post;
use app\models\Sekolah;
use app\models\Pengaturan;
use app\models\Post_Search;
use app\models\Sekolah_Search;
use app\models\Pengaturan_Search;
use app\models\Peserta_Search;

class AdminPusatController extends Controller
{
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionIndex() {
        $tingkat = ['MENENGAH ATAS', 'MENENGAH PERTAMA'];
        $model   = $this->dataAll();
        $label   = ['KEDU', 'PATI', 'PEKALONGAN', 'PURWOKERTO', 'SEMARANG', 'SURAKARTA', 'YOGYAKARTA', 'KADALUARSA', 'KESELURUHAN', 'HARI INI'];

        $jumlah  = [];
        for ($i=0; $i < 7; $i++) {
            $jumlah[$i]   = $model->where(['tingkat' => $tingkat[0], 'status' => 10, 'panlok' => $label[$i]])
                ->andWhere(['!=', 'jenis_pendaftaran', '_OFFLINE'])->count();
            $jumlah[$i+7] = $model->where(['tingkat' => $tingkat[1], 'status' => 10, 'panlok' => $label[$i]])
                ->andWhere(['!=', 'jenis_pendaftaran', '_OFFLINE'])->count();
        }
        for ($i=0; $i < 2; $i++) {
            $jumlah[$i+14] = $model->where(['tingkat' => $tingkat[$i], 'status' => 0])->andWhere(['<=', 'created_at', strtotime('-36 HOURS')])
                ->andWhere(['!=', 'jenis_pendaftaran', '_OFFLINE'])->count();
            $jumlah[$i+16] = $model->where(['tingkat' => $tingkat[$i], 'status' => 10])
                ->andWhere(['!=', 'jenis_pendaftaran', '_OFFLINE'])->count();
            // $jumlah[$i+18] = $model->where(['tingkat' => $tingkat[$i]])->andWhere(['between', 'created_at', strtotime(date('Y-m-d 00:00:00')), strtotime(date('Y-m-d 23:59:59'))])
            //     ->andWhere(['!=', 'jenis_pendaftaran', '_OFFLINE'])->count();
             $jumlah[$i+18] = 0;
        }

        return $this->render('index', [
            'label'  => $label,
            'jumlah' => $jumlah
        ]);
    }


    public function actionSertifikat() {

      $searchModel = new Peserta_Search();
      $dataProvider = $searchModel->sertifikat(Yii::$app->request->queryParams);

      return $this->render('sertifikat', [
          'searchModel' => $searchModel,
          'dataProvider' => $dataProvider,
      ]);
    }

    public function actionGeneratePassword($text = 'text')
    {
        $value = $text;
        $hash = Yii::$app->security->generatePasswordHash($value);

        return $this->render('generate-password', [
            'value' => $value,
            'hash' => $hash
        ]);
    }

    public function actionStatistik($lokasi)
    {
        $searchModel = new Peserta_Search();
        $dataProvider = $searchModel->statistik(Yii::$app->request->queryParams, $lokasi);

        return $this->render('statistik', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionPost()
    {
        $searchModel = new Post_Search();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('post', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionViewPost($id)
    {
        return $this->render('view-post', [
            'model' => $this->findModelPost($id),
        ]);
    }

    public function actionTambahPost()
    {
        $model = new Post();

        if ($model->load(Yii::$app->request->post())) {
            $model->author = Yii::$app->user->identity->id;
            $model->date   = date('Y-m-d H:i:s');
            $model->save();
            return $this->redirect(['view-post', 'id' => $model->id]);
        } else {
            return $this->render('tambah-post', [
                'model' => $model,
            ]);
        }
    }

    public function actionUpdatePost($id)
    {
        $model = $this->findModelPost($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view-post', 'id' => $model->id]);
        } else {
            return $this->render('update-post', [
                'model' => $model,
            ]);
        }
    }

    public function actionDeletePost($id)
    {
        $this->findModelPost($id)->delete();
        return $this->redirect(['post']);
    }

    public function actionSekolah()
    {
        $searchModel = new Sekolah_Search();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('sekolah', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionViewSekolah($id)
    {
        return $this->render('view-sekolah', [
            'model' => $this->findModelSekolah($id),
        ]);
    }

    public function actionTambahSekolah()
    {
        $model = new Sekolah();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view-sekolah', 'id' => $model->id]);
        } else {
            return $this->render('tambah-sekolah', [
                'model' => $model,
            ]);
        }
    }

    public function actionUpdateSekolah($id)
    {
        $model = $this->findModelSekolah($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view-sekolah', 'id' => $model->id]);
        } else {
            return $this->render('update-sekolah', [
                'model' => $model,
            ]);
        }
    }

    public function actionDeleteSekolah($id)
    {
        $this->findModelSekolah($id)->delete();
        return $this->redirect(['sekolah']);
    }

    public function actionPengaturan()
    {
        $searchModel = new Pengaturan_Search();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('pengaturan', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionViewPengaturan($id)
    {
        return $this->render('view-pengaturan', [
            'model' => $this->findModelPengaturan($id),
        ]);
    }

    public function actionTambahPengaturan()
    {
        $model = new Pengaturan();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view-pengaturan', 'id' => $model->id]);
        } else {
            return $this->render('tambah-pengaturan', [
                'model' => $model,
            ]);
        }
    }

    public function actionUpdatePengaturan($id)
    {
        $model = $this->findModelPengaturan($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view-pengaturan', 'id' => $model->id]);
        } else {
            return $this->render('update-pengaturan', [
                'model' => $model,
            ]);
        }
    }

    public function actionDeletePengaturan($id)
    {
        $this->findModelPengaturan($id)->delete();
        return $this->redirect(['pengaturan']);
    }

    public function actionPeserta()
    {
        $searchModel = new Peserta_Search();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('peserta', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionViewPeserta($id)
    {
        return $this->render('view-peserta', [
            'model' => $this->findModelPeserta($id),
        ]);
    }

    public function actionCetak() {
        $tingkat = ['MENENGAH ATAS', 'MENENGAH PERTAMA'];
        $lokasi  = ['KEDU', 'PATI', 'PEKALONGAN', 'PURWOKERTO', 'SEMARANG', 'SURAKARTA', 'YOGYAKARTA'];

        return $this->render('cetak', [
            'tingkat' => $tingkat,
            'lokasi'  => $lokasi
        ]);
    }

    protected function findModelPeserta($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function findModelPengaturan($id)
    {
        if (($model = Pengaturan::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function findModelPost($id)
    {
        if (($model = Post::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function findModelSekolah($id)
    {
        if (($model = Sekolah::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function dataAll()
    {
        if (($model = User::find()->where(['!=', 'tingkat', 'ADMIN'])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
