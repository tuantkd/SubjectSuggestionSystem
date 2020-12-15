from sklearn import metrics
from sklearn.ensemble import RandomForestRegressor
from sklearn.preprocessing import StandardScaler
from sklearn.model_selection import train_test_split
import pandas as pd
import numpy as np
dataset = pd.read_csv('C:/xampp/htdocs/subjectsuggestionsystem/public/run_python/D1_format.csv')
#print("Tập dữ liệu ban đầu")
#print(dataset.head())
#print("\n")
X = dataset.iloc[:, 0:5].values
y = dataset.iloc[:, 5].values

#print("Tập huấn luyện")
#print(X)
#print("\n")
#print("Tập kiểm tra")
#print(y)
#print("\n")

X_train, X_test, y_train, y_test = train_test_split(
    X, y, test_size=0.2, random_state=0)

# Feature Scaling
sc = StandardScaler()
X_train = sc.fit_transform(X_train)
X_test = sc.transform(X_test)

# Tham số quan trọng nhất của RandomForestRegressor lớp là n_estimators tham số
# Tham số này xác định số lượng cây trong rừng ngẫu nhiên.
# Bắt đầu với n_estimator=20 để xem thuật toán hoạt động như thế nào
regressor = RandomForestRegressor(n_estimators=20, random_state=0)
regressor.fit(X_train, y_train)
y_pred = regressor.predict(X_test)

ran_data = [1070022, 309, 20111, 1, 3]
ran_data_arr = np.array(ran_data)
ran_data_num = ran_data_arr.reshape(1, -1)
pred_single_row = regressor.predict(ran_data_num)

pred_single_row = round(float(pred_single_row), 2)
#print(Kết quả hồi quy")
print(pred_single_row)
#print("\n")

# Lỗi tuyệt đối trung bình
#print('Mean Absolute Error:', metrics.mean_absolute_error(y_test, y_pred))
# Lỗi bình phương
#print('Mean Squared Error:', metrics.mean_squared_error(y_test, y_pred))
# Lỗi bình phương trung bình gốc
#print('Root Mean Squared Error:', np.sqrt(metrics.mean_squared_error(y_test, y_pred)))
