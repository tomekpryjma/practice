// https://leetcode.com/problems/reverse-integer/

class Solution {
public:
    int reverse(int x) {
        if (x == 0) {
            return x;
        }
        
        std::string numberAsString = std::to_string(x);
        std::string reversed;
        bool numberIsNegative = (numberAsString.at(0) == '-');
        long int answer;

        if (numberIsNegative) {
            numberAsString.erase(0, 1);
        }

        for (int i = numberAsString.length() - 1; i > -1; --i) {
            reversed += numberAsString[i];
        }

        if (reversed.at(0) == '0') {
            reversed.erase(0, 1);
        }

        if (numberIsNegative) {
            reversed.insert(reversed.begin(), '-');
        }

        try {
            answer = std::stoi(reversed);
        }
        catch(std::out_of_range& error) {
            return 0;
        }

        return answer;
    }
};