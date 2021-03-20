// https://leetcode.com/problems/two-sum/

class Solution {
public:    
    vector<int> twoSum(vector<int>& nums, int target) {
        std::vector<int> result;

        for (int index = 0; index < nums.size(); index++) {
            int current = nums[index];
            int difference = target - current;
            std::vector<int>::iterator iter = std::find(nums.begin(), nums.end(), difference);

            if (iter != nums.end()) {
                int otherIndex = std::distance(nums.begin(), iter);
                
                if (otherIndex == index) {
                    continue;
                }

                result.push_back(index);
                result.push_back(otherIndex);

                break;
            }
        }

        return result;
    }
};