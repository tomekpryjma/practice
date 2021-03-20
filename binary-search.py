nums = [2568, 94, 1436, 326, 3397, 1335, 1129, 114, 4808, 4028, 2042, 2116, 270, 229, 4097, 2212]
nums = sorted(nums)
 
def binary_search(arr, lookingFor):
    if (len(arr) > 0):
        middleIndex = int((len(arr) - 1) / 2)
        middleValue = nums[middleIndex]
        
        if (lookingFor > middleValue):
            del arr[0:middleIndex + 1] # +1 makes the deletion inclusive
            
        elif (lookingFor < middleValue):
            del arr[middleIndex:len(arr) + 1]
            
        elif (middleValue == lookingFor):
            return middleValue
        
        return binary_search(arr, lookingFor)

    return -1

result = binary_search(nums, 2212)

if (result != -1):
    print("Yaaay!")
else:
    print("Booo!")