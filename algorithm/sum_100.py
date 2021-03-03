import random
import numpy



def find_l_exp_expression(L,n_sum):
    l_exp_result=[]

    l_sub=[]
    #l_sub[0]=['1+','1-','1']
    for i in L:
        l_sub.append(['%s+'%i,'%s-'%i,'%s'%i])

    a = [[0,1,2]]*8

    L_a=[list(x) for x in numpy.array(numpy.meshgrid(*a)).T.reshape(-1,len(a))]
    

    count=0

    for j in L_a:
        
        i0,i1,i2,i3,i4,i5,i6,i7=j
        l_exp=''
        l_exp+=l_sub[0][i0]+l_sub[1][i1]+l_sub[2][i2]
        l_exp+=l_sub[3][i3]+l_sub[4][i4]+l_sub[5][i5]
        l_exp+=l_sub[6][i6]+l_sub[7][i7]+L[-1]

        total=eval(l_exp)
        if total==n_sum:
            l_exp_result.append(l_exp)
            count=count+1

    print('=== Number of results : ',count,' ===')
    return l_exp_result
    
if __name__=='__main__':
    L='123456789'
    l_exp_operator=['','+','-']
    n_sum=int(input('Sum to :'))

    l_result=find_l_exp_expression(L,n_sum)
    for i in l_result :
        print ('\t',n_sum,' = ',i)
    