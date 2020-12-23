from sklearn.metrics import mean_absolute_error, mean_squared_error
from sklearn.ensemble import RandomForestRegressor
from sklearn.preprocessing import StandardScaler
from sklearn.model_selection import train_test_split
import pandas as pd
import json
import pickle
import numpy as np

dataset = pd.read_csv('C:/xampp/htdocs/subjectsuggestionsystem/public/run_python/train_format_phase1.csv')
dataset_test = pd.read_csv('C:/xampp/htdocs/subjectsuggestionsystem/public/run_python/test_format_phase2.csv')

dataset = dataset.dropna()
dataset_test = dataset.dropna()

print("Tập dữ liệu ban đầu hiển thị 10 dòng")
print(dataset.head(10))


print("\n")
X = dataset.iloc[:, 0:3].values
y = dataset.iloc[:, 3].values


print("Phân ra tập huấn luyện")
print(X)
print("\n")
print("Phân ra tập kiểm tra")
print(y)
print("\n")

X_train, X_test, y_train, y_test = train_test_split(
    X, y, test_size=0.2, random_state=0)


# Feature Scaling
# sc = StandardScaler()
# X_train = sc.fit_transform(X_train)
# X_test = sc.transform(X_test)


# Tham số quan trọng nhất của RandomForestRegressor lớp là n_estimators tham số
# Tham số này xác định số lượng cây trong rừng ngẫu nhiên.
# Bắt đầu với n_estimator=20 để xem thuật toán hoạt động như thế nào
regressor = RandomForestRegressor(n_estimators=5, random_state=100)
regressor.fit(X_train, y_train)
y_pred = regressor.predict(X_test)

print('Tập kết quả dự đoán sau khi huấn luyện mô hình')
print(y_pred)
print("\n")


# Chuyển đổi export file json
# class NumpyEncoder(json.JSONEncoder):
#     def default(self, obj):
#         if isinstance(obj, np.integer):
#             return int(obj)
#         elif isinstance(obj, np.floating):
#             return float(obj)
#         elif isinstance(obj, np.ndarray):
#             return obj.tolist()
#         return json.JSONEncoder.default(self, obj)

# dumped = json.dumps(y_pred, cls=NumpyEncoder)
# with open('result.json', 'w') as f:
#     json.dump(dumped, f)

print('Tập dữ liệu khác đưa vào kiểm tra hiển thị 10 dòng')
print(dataset_test.head(10))
data_train = dataset_test.iloc[:, 0:3].values
data_test = dataset_test.iloc[:, 3].values
print("\n")

print("Đầu vào các thuộc tính trích từ tập dữ liệu khác")
print(data_train)


# ran_data_arr = np.array(data_train)
# ran_data_num = ran_data_arr.reshape(1, -1)
pred_single_row = regressor.predict(data_train)
#pred_single_row = round(float(pred_single_row), 2)
# print(pred_single_row)
# print("\n")


print("Kết quả dự đoán")
print(pred_single_row)
print("\n")

# input_msv = int(input("Ma SV: "))
# input_mmh = int(input("Ma MH: "))
# input_nhhk = int(input("Ma NHHK: "))

# ran_data = [input_msv, input_mmh, input_nhhk]
# # ran_data = [1607138, 234, 20192]
# ran_data_arr = np.array(ran_data)
# ran_data_num = ran_data_arr.reshape(1, -1)
# pred_single_row = regressor.predict(ran_data_num)

# pred_single_row = round(float(pred_single_row), 2)
# print("Kết quả hồi quy")
# print(pred_single_row)
# print("\n")


# Lỗi tuyệt đối trung bình
print('Mean Absolute Error:', mean_absolute_error(y_test, y_pred))
# Lỗi bình phương
print('Mean Squared Error:', mean_squared_error(y_test, y_pred))
# Lỗi bình phương trung bình gốc
print('Root Mean Squared Error:', np.sqrt(mean_squared_error(y_test, y_pred)))


#print("Lưu mô hình vào file result.pickle")
#with open("train_model.pickle", "wb") as file:
#    pickle.dump(regressor, file)


# with open('result.json', 'r') as j:
#     json_data = json.load(j)
#     print(json_data)
