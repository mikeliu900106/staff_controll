<!DOCTYPE html>
<html>


<body>

    <form method="post" action="{{route("Student.update","111")}}">
        @csrf
        @method("patch")
                <h1 class="text-center">職缺新增</h1>
                <div class="form-group col-12">
                    <label for="vacancies_name">職位名稱</label>
                    <input type="text" name="vacancies_name" class="form-control" placeholder="請輸入職位名稱">
                </div>

                <div class="Vacancies-Submit">
                    <input class="btn btn-dark w-100" type="submit" value="提交" />
                </div>
            </div>
        </div>
    </form>

</body>

</html>