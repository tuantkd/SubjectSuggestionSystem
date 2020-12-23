from sklearn.metrics import mean_absolute_error, mean_squared_error
from sklearn.ensemble import RandomForestRegressor
from sklearn.preprocessing import StandardScaler
from sklearn.model_selection import train_test_split
import pandas as pd
import json
import pickle
import numpy as np

with open('C:/xampp/htdocs/subjectsuggestionsystem/public/run_python/train_model.pickle', "rb") as file:
    regression_model = pickle.load(file)

# input_msv = int(input("Ma SV: "))
# input_mmh = int(input("Ma MH: "))
# input_nhhk = int(input("Ma NHHK: "))

# ran_data = [input_msv, input_mmh, input_nhhk]
# ran_data_arr = np.array(ran_data)
# ran_data_num = ran_data_arr.reshape(1, -1)
# pred_single_row = regression_model.predict(ran_data_num)


# pred_single_row = round(float(pred_single_row), 2)

# print("\n")
# print("Kết quả hồi quy")
# print(pred_single_row)
# print("\n")


dataset_test = pd.read_csv('C:/xampp/htdocs/subjectsuggestionsystem/public/run_python/test_format_phase2.csv')
#print('Tập dữ liệu khác đưa vào kiểm tra hiển thị 10 dòng')
#print(dataset_test.head(10))
#print("\n")

#print("Đầu vào các thuộc tính trích từ tập dữ liệu khác")
data_train = dataset_test.iloc[:, 0:3].values
#print(data_train)
#print("\n")


# ran_data_arr = np.array(data_train)
# ran_data_num = ran_data_arr.reshape(1, -1)
pred_row = regression_model.predict(data_train)
#pred_single_row = round(float(pred_single_row), 2)
# print(pred_single_row)
# print("\n")

#print("Kết quả dự đoán")
print(pred_row)

dataset_test['PREDICT_SCORE'] = pred_row
dataset_test.to_csv('C:/xampp/htdocs/subjectsuggestionsystem/public/run_python/data_predict.csv')

